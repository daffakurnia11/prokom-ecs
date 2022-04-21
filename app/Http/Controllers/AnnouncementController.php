<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pengumuman.index', [
            'title'         => 'Daftar Pengumuman',
            'announcements' => Announcement::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengumuman.create', [
            'title'     => 'Buat Pengumuman',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        return view('admin.pengumuman.edit', [
            'title'         => 'Ubah Pengumuman',
            'announcement'  => $announcement
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        //
    }
}
