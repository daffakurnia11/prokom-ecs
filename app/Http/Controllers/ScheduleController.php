<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Carbon::setLocale(config('app.locale'));
        return view('admin.jadwal.index', [
            'title'         => 'Daftar Jadwal Pelatihan',
            'schedules'     => Schedule::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jadwal.create', [
            'title'     => 'Buat Jadwal Pelatihan',
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
            'activity'      => 'required|max:255',
            'date'          => 'required',
            'time_start'    => 'required',
            'time_ended'    => 'required',
            'place'         => 'required|max:255'
        ]);
        $validated['present_code'] = random_int(100000, 999999);

        Schedule::create($validated);
        return redirect('admin/jadwal')->with('message', 'Schedule created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        return view('admin.jadwal.edit', [
            'title'     => 'Buat Jadwal Pelatihan',
            'schedule'  => $schedule
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        $validated = $request->validate([
            'activity'      => 'required|max:255',
            'date'          => 'required',
            'time_start'    => 'required',
            'time_ended'    => 'required',
            'place'         => 'required|max:255'
        ]);

        $schedule->update($validated);
        return redirect('admin/jadwal')->with('message', 'Schedule updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        //
    }

    public function regenerate(Schedule $schedule)
    {
        $validated['present_code'] = random_int(100000, 999999);

        $schedule->update($validated);
        return redirect('admin/jadwal')->with('message', 'Code regenerated');
    }
}
