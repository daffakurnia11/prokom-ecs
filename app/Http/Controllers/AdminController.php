<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'title'     => 'Hallo, ' . auth()->user()->name
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
        // return $user;
        return view('admin.detail_pendaftar', [
            'title'     => 'Data Pendaftar ' . $user->name,
            'user'      => $user
        ]);
    }
}
