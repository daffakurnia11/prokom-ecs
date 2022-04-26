<?php

namespace App\Http\Controllers;

use App\Models\Presence;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function briefing()
    {
        return view('admin.kehadiran', [
            'title'     => 'Data Kehadiran Briefing',
            'schedule'  => '1',
            'users'     => User::where('roles', 'Member')->get()
        ]);
    }
    public function p1()
    {
        return view('admin.kehadiran', [
            'title'     => 'Data Kehadiran Pelatihan P1',
            'schedule'  => '2',
            'users'     => User::where('roles', 'Member')->get()
        ]);
    }
    public function p2()
    {
        return view('admin.kehadiran', [
            'title'     => 'Data Kehadiran Pelatihan P2',
            'schedule'  => '3',
            'users'     => User::where('roles', 'Member')->get()
        ]);
    }
    public function p3()
    {
        return view('admin.kehadiran', [
            'title'     => 'Data Kehadiran Pelatihan P3',
            'schedule'  => '4',
            'users'     => User::where('roles', 'Member')->get()
        ]);
    }
    public function setAttend(Request $request)
    {
        $schedule = Schedule::firstWhere('id', $request->schedule);
        $user = User::firstWhere('id', $request->user);

        Presence::create([
            'schedule_id'   => $schedule->id,
            'user_id'       => $user->id,
            'present_code'  => 'Attend by Admin',
        ]);
        return back()->with('message', 'Member attended');
    }
    public function setPermission(Request $request)
    {
        $schedule = Schedule::firstWhere('id', $request->schedule);
        $user = User::firstWhere('id', $request->user);

        Presence::create([
            'schedule_id'   => $schedule->id,
            'user_id'       => $user->id,
            'present_code'  => 'Permit',
        ]);
        return back()->with('message', 'Member permitted');
    }
}
