<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Group;
use App\Models\Module;
use App\Models\Participant;
use App\Models\Presence;
use App\Models\Presentation;
use App\Models\Profile;
use App\Models\Schedule;
use App\Models\Submission;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index()
    {
        return view(
            'members.dashboard.index',
            [
                'title'         => 'Dashboard',
                'announcements' => Announcement::where('published_at', '!=', NULL)->orderBy('published_at', 'DESC')->get()
            ]
        );
    }
    public function progress()
    {
        $total = Schedule::count() + 3;
        $attend = Presence::where('user_id', auth()->user()->id)->count();
        $submission = Submission::where('user_id', auth()->user()->id)->count();
        $progress = round((($attend + $submission) / $total) * 100);
        return view(
            'members.dashboard.progress',
            [
                'title'         => 'My Progress',
                'schedules'     => Schedule::all(),
                'presences'     => Presence::where('user_id', auth()->user()->id)->get(),
                'submissions'   => Submission::where('user_id', auth()->user()->id)->get(),
                'progress'      => $progress
            ]
        );
    }

    public function profile()
    {
        return view(
            'members.dashboard.profile',
            [
                'title' => 'Profil'
            ]
        );
    }

    public function updateProfile(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'              => 'required|max:255',
            'email'             => 'required|email:dns|max:255',
            'photo'             => 'nullable|max:5128|mimes:png,jpg,jpeg',
            'student_number'    => 'required|max:15',
            'batch'             => 'required|min:4',
            'line_id'           => 'nullable|max:255',
            'whatsapp'          => 'required|max:255'
        ]);

        $getId = $user->id;
        $profile = Profile::firstWhere('user_id', $getId);

        if ($request->hasFile('photo')) {
            if ($profile->photo) {
                unlink(public_path('img/photo_profile/' . $profile->photo));
            } else {
                $filename = $validated['name'] . '_photo.' . $validated['photo']->extension();
                $validated['profile_pict'] = $filename;
                $request->photo->move(public_path('img/photo_profile'), $filename);
            }
        }

        $user->update($validated);
        $profile->update($validated);

        return back()->with('message', 'Profile updated');
    }

    public function password()
    {
        return view(
            'members.dashboard.password',
            [
                'title' => 'Ubah Password'
            ]
        );
    }

    public function updatePass(Request $request, User $user)
    {
        $validated = $request->validate([
            'oldpass'           => 'required|current_password',
            'password'          => 'required|same:repeat|min:8',
            'repeat'            => 'required|min:8',
        ]);
        $user->update([
            'password'  => Hash::make($validated['password'])
        ]);
        return back()->with('message', 'Password updated');
    }

    public function modules()
    {
        return view(
            'members.dashboard.modules',
            [
                'title'         => 'Berkas Pelatihan',
                'modules'       => Module::orderBy('created_at', 'DESC')->get()
            ]
        );
    }

    public function schedules()
    {
        return view(
            'members.dashboard.schedules',
            [
                'title'         => 'Jadwal Pelatihan',
                'schedules'     => Schedule::all(),
                'presences'     => Presence::where('user_id', auth()->user()->id)->get(),
                'presentations' => Presentation::all()
            ]
        );
    }

    public function onPresence(Request $request, Schedule $schedule)
    {
        $validator = Validator::make($request->all(), [
            'present_code'  => 'required|digits:6|numeric'
        ]);

        if ($validator->fails()) {
            return back()->with('message', 'Kode Presensi salah!');
        }

        if ($request->present_code == $schedule->present_code) {
            Presence::create([
                'schedule_id'   => $schedule->id,
                'user_id'       => auth()->user()->id,
                'present_code'  => $request->present_code
            ]);
            return back()->with('message', 'Kehadiran tercatat!');
        } else {
            return back()->with('message', 'Kode Presensi salah!');
        }
    }

    public function groups()
    {
        if (auth()->user()->roles == 'Admin') {
            $selector = auth()->user()->group->group_number ?? NULL;
        } else {
            $selector = auth()->user()->participant->group_number;
        }
        return view(
            'members.dashboard.groups',
            [
                'title'         => 'Kelompok Pelatihan',
                'number'        => $selector,
                'participants'  => Participant::where('group_number', $selector)->get(),
                'group'         => Group::firstWhere('group_number', $selector),
                'presentation'  => Presentation::firstWhere('group_number', $selector)
            ]
        );
    }

    public function assignment()
    {
        $data = Submission::where('module', 'FP')->firstWhere('user_id', auth()->user()->id) ?? NULL;
        $deadline = Carbon::create(2022, 5, 28, 9, 36, 0);

        return view(
            'members.dashboard.assignment',
            [
                'title'         => 'Penugasan Pelatihan',
                'submission'    => $data,
                'submitted'     => $data ? $data->created_at->diffForHumans($deadline, ['parts' => 3]) : NULL
            ]
        );
    }

    public function submission(Request $request)
    {
        $validated = $request->validate([
            'file'      => 'required|mimes:zip',
            'notes'     => 'nullable'
        ]);

        $validated['user_id'] = auth()->user()->id;
        $validated['group_number'] = auth()->user()->participant->group_number;
        $validated['module'] = 'FP';

        $filename = auth()->user()->student_number . '_FP_Submission.' . $validated['file']->extension();
        $validated['file'] = $filename;
        $request->file->move(public_path('files/submission'), $filename);

        Submission::create($validated);
        return back()->with('message', 'Submitted');
    }
}
