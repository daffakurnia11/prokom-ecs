<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

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
}
