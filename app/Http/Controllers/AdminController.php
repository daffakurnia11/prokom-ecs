<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
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

    public function pendaftar()
    {
        return view('admin.pendaftar', [
            'title'     => 'Data Pendaftar',
            'users'     => User::where('roles', 'Member')->get()
        ]);
    }

    public function show(User $user)
    {
        return view('admin.detail_pendaftar', [
            'title'     => 'Data Pendaftar ' . $user->name,
            'user'      => $user
        ]);
    }

    public function verifying(User $user)
    {
        $user->update([
            'verified'  => TRUE
        ]);
        return redirect('admin/pendaftar')->with('message', 'Account verified');
    }
}
