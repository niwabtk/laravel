<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with(['group', 'user'])->get();

        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        // mengambil semua data group dan user untuk ditampilkan pada form
        $groups = Group::all();
        $users = User::all();

        return view('schedules.create', compact('groups', 'users'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'group_id' => 'required|exists:groups,id',
            'user_id' => 'required|exists:users,id',
            'note' => 'required',
            'time_start_at' => 'required|date_format:Y-m-d H:i:s',
            'time_end_at' => 'required|date_format:Y-m-d H:i:s|after:time_start_at',
        ]);

        Schedule::create($validatedData);

        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit(Schedule $schedule)
    {
        // mengambil semua data group dan user untuk ditampilkan pada form
        $groups = Group::all();
        $users = User::all();

        return view('schedules.edit', compact('schedule', 'groups', 'users'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $validatedData = $request->validate([
            'group_id' => 'required|exists:groups,id',
            'user_id' => 'required|exists:users,id',
            'note' => 'required',
            'time_start_at' => 'required|date_format:Y-m-d H:i:s',
            'time_end_at' => 'required|date_format:Y-m-d H:i:s|after:time_start_at',
        ]);

        $schedule->update($validatedData);

        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}

