<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Group;
use App\Models\Participant;
use App\Models\Presence;
use App\Models\Profile;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
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
            'student_number'    => 'required|max:15',
            'batch'             => 'required|min:4',
            'line_id'           => 'nullable|max:255',
            'whatsapp'          => 'required|max:255'
        ]);

        $getId = $user->id;
        $profile = Profile::firstWhere('user_id', $getId);

        $user->update($validated);
        $profile->update($validated);

        return back()->with('message', 'Profile updated');
    }

    public function modules()
    {
        return view(
            'members.dashboard.modules',
            [
                'title'         => 'Berkas Pelatihan',
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
                'presences'     => Presence::where('user_id', auth()->user()->id)->get()
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
            $selector = auth()->user()->group->group_number;
        } else {
            $selector = auth()->user()->participant->group_number;
        }
        return view(
            'members.dashboard.groups',
            [
                'title'         => 'Kelompok Pelatihan',
                'number'        => $selector,
                'participants'  => Participant::where('group_number', $selector)->get(),
                'group'         => Group::firstWhere('group_number', $selector)
            ]
        );
    }
}
