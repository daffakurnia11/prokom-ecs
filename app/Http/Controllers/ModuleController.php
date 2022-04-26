<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.modul.index', [
            'title'         => 'Daftar Modul',
            'modules'       => Module::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.modul.create', [
            'title'     => 'Tambah Modul',
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
            'module'        => 'required|max:255',
            'description'   => 'nullable|max:255',
            'filename'      => 'required'
        ]);

        if ($request->hasFile('filename')) {
            $validated['user_id'] = auth()->user()->id;

            $filename = $request->module . '.' . $request->filename->extension();
            $request->filename->move(public_path('/files/module'), $filename);
            $validated['filename'] = $filename;

            Module::create($validated);
            return redirect('admin/modul')->with('message', 'Module created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        return view('admin.modul.edit', [
            'title'     => 'Ubah Modul',
            'module'    => $module
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        $validated = $request->validate([
            'module'        => 'required|max:255',
            'description'   => 'nullable|max:255',
            'filename'      => 'nullable|mimes:pdf|max:5128'
        ]);

        if ($request->hasFile('filename')) {
            unlink(public_path('files/module/' . $module->filename));
            $validated['user_id'] = auth()->user()->id;

            $filename = $request->module . '.' . $request->filename->extension();
            $request->filename->move(public_path('/files/module'), $filename);
            $validated['filename'] = $filename;
        }
        $module->update($validated);
        return redirect('admin/modul')->with('message', 'Module updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        unlink(public_path('files/module/' . $module->filename));

        $module->delete();
        return redirect('admin/modul')->with('message', 'Module deleted');
    }
}
