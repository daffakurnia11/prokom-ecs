<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Group;
use App\Models\Participant;
use App\Models\Presence;
use App\Models\Schedule;
use App\Models\Submission;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'title'         => 'Hallo, ' . auth()->user()->name,
            'participants'  => User::where('roles', 'Member')->count(),
            'unverified'    => User::where('roles', 'Member')->where('verified', 0)->count(),
        ]);
    }

    public function data()
    {
        return view('admin.admin', [
            'title'         => 'Data Admin',
            'admins'        => User::where('roles', 'Admin')->orderBy('batch')->orderBy('student_number')->get()
        ]);
    }

    public function pendaftar()
    {
        return view('admin.pendaftar', [
            'title'     => 'Data Pendaftar',
            'users'     => User::where('roles', 'Member')->get()
        ]);
    }

    public function show(User $user)
    {
        $total = Schedule::count() + 3;
        $attend = Presence::where('user_id', $user->id)->count();
        $submission = Submission::where('user_id', $user->id)->count();
        $progress = round((($attend + $submission) / $total) * 100);

        return view('admin.detail_pendaftar', [
            'title'         => 'Data Pendaftar ' . $user->name,
            'user'          => $user,
            'schedules'     => Schedule::all(),
            'presences'     => Presence::where('user_id', $user->id)->get(),
            'progress'      => $progress,
            'submissions'   => Submission::where('user_id', $user->id)->get()
        ]);
    }

    public function verifying(User $user)
    {
        $user->update([
            'verified'  => TRUE
        ]);
        return redirect('admin/pendaftar')->with('message', 'Account verified');
    }

    public function groups()
    {
        return view('admin.kelompok', [
            'title'         => 'Data Kelompok',
            'groups'        => Group::where('group_number', '!=', NULL)->orderBy('group_number')->get(),
            'participants'  => Participant::all()
        ]);
    }

    public function progress()
    {
        return view('admin.progress', [
            'title'     => 'Rekap Progress',
            'users'     => User::where('roles', 'Member')->get(),
            'presences' => Presence::all(),
        ]);
    }
}
