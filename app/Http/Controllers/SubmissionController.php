<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function p1()
    {
        return view('admin.modul.submission', [
            'title'         => 'Daftar Penugasan P1',
            'module'        => 'P1',
            'submission'    => Submission::where('module', 'P1')->get()
        ]);
    }
    public function p2()
    {
        return view('admin.modul.submission', [
            'title'         => 'Daftar Penugasan P2',
            'module'        => 'P2',
            'submission'    => Submission::where('module', 'P2')->get()
        ]);
    }
    public function fp()
    {
        return view('admin.modul.submission', [
            'title'         => 'Daftar Penugasan Final Project',
            'module'        => 'Final Project',
            'submission'    => Submission::where('module', 'FP')->get()
        ]);
    }
    public function fp_rev()
    {
        return view('admin.modul.submission-rev', [
            'title'         => 'Daftar Revisi Final Project',
            'module'        => 'Revisi Final Project',
            'submission'    => Submission::where('module', 'FP-rev')->get()
        ]);
    }
}
