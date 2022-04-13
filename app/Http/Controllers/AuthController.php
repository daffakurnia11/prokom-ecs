<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('members.register', [
            'title' => 'Register Akun'
        ]);
    }

    public function registration(Request $request)
    {
        $validated = $request->validate([
            'name'              => 'required|max:255',
            'email'             => 'required|email:dns|max:255|unique:users',
            'password'          => 'required|same:repeat|min:8',
            'repeat'            => 'required|min:8',
            'student_number'    => 'required|unique:users',
            'batch'             => 'required|min:4',

            'classes'           => 'required',
            'krsm'              => 'required|max:2048|mimes:pdf',
            'payment'           => 'required|max:2048|mimes:png,jpg,jpeg',
            'screenshot'        => 'required|max:2048|mimes:png,jpg,jpeg',
        ]);
        $validated['password'] = Hash::make($validated['password']);

        if ($request->hasFile('krsm') && $request->hasFile('payment') && $request->hasFile('screenshot')) {
            $fileName = $request->student_number . '_KRSM.' . $request->krsm->extension();
            $request->krsm->move(public_path('files/krsm'), $fileName);
            $validated['krsm'] = $fileName;

            $paymentName = $request->student_number . '_Payment.' . $request->payment->extension();
            $request->payment->move(public_path('files/payment'), $paymentName);
            $validated['payment'] = $paymentName;

            $screenshotName = $request->student_number . '_Screenshot.' . $request->screenshot->extension();
            $request->screenshot->move(public_path('files/screenshot'), $screenshotName);
            $validated['screenshot'] = $screenshotName;

            $validated['user_id'] = User::create($validated)->id;
            Participant::create($validated);
            Profile::create([
                'user_id'       => $validated['user_id'],
                'university'    => 'Institut Teknologi Sepuluh Nopember',
                'major'         => 'Teknik Fisika',
            ]);
        }

        return redirect('/login')->with('message', 'Register success');
    }

    public function login()
    {
        return view('members.login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'     => 'required|email:dns',
            'password'  => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            if (auth()->user()->verified) {
                $request->session()->regenerate();
                return redirect()->intended('/');
            } else {
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/login')->with('message', 'Not Verified');
            }
        }

        return back()->with('message', 'Login failed');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Logout success');
    }
}
