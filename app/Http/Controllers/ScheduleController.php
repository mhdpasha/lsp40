<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Schema;
use App\Models\Schedule;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.jadwal.index', [
            'title' => 'Jadwal Sertifikasi',
            'schedule' => Schedule::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.jadwal.create', [
            'schemes' => Schema::all(),
            'asesor' => User::where('role', 'Asesor')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScheduleRequest $request)
    {

        $validated = $request->validate([
            'judul' => 'required',
            'asessor_id' => 'required',
            'schema_id' => 'required',
            'TUK' => 'required',
            'timeline_start' => 'required',
            'timeline_end' => 'required'
        ]);

        Schedule::create($validated);

        return redirect(route('schedule.index'))->with('success', 'Data added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
