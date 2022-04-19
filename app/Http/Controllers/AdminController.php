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

    public function announce()
    {
        return view('admin.list_pengumuman', [
            'title'         => 'Daftar Pengumuman',
            'announcements' => Announcement::all()
        ]);
    }

    public function new_announce()
    {
        return view('admin.create_pengumuman', [
            'title'     => 'Buat Pengumuman',
        ]);
    }

    public function create_announce(Request $request)
    {
        $validated = $request->validate([
            'title'         => 'required|max:255',
            'description'   => 'required',
        ]);
        $validated['user_id'] = auth()->user()->id;

        if ($request->publish) {
            $validated['published_at'] = Carbon::now();
        } else {
            $validated['published_at'] = NULL;
        }
        Announcement::create($validated);
        return redirect('admin/pengumuman')->with('message', 'Announcement created');
    }

    public function edit_announce(Announcement $announcement)
    {
        return view('admin.edit_pengumuman', [
            'title'         => 'Ubah Pengumuman',
            'announcement'  => $announcement
        ]);
    }

    public function update_announce(Announcement $announcement, Request $request)
    {
        $validated = $request->validate([
            'title'         => 'required|max:255',
            'description'   => 'required',
        ]);

        if ($request->publish) {
            $validated['published_at'] = Carbon::now();
        } else {
            $validated['published_at'] = NULL;
        }
        $announcement->update($validated);
        return redirect('admin/pengumuman')->with('message', 'Announcement updated');
    }
}
