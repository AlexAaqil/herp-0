<?php

namespace App\Http\Controllers;

use App\Models\Timeslots;
use Illuminate\Http\Request;

class TimeslotsController extends Controller
{
    public function index()
    {
        $timeslots = Timeslots::orderBy("created_at","desc")->get();

        return view('admin.settings.timeslots.index', compact('timeslots'));
    }

    public function create()
    {
        return view('admin.settings.timeslots.create');
    }

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'day' => 'required|string|in:Monday,Tuesday,Wednesday,Thursday,Friday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        Timeslots::create($validated_data);

        return redirect()->route('timeslots.index')->with('success', ['message' =>  'Timeslot has been added']);
    }

    public function edit(Timeslots $timeslot)
    {
        return view('admin.settings.timeslots.edit', compact('timeslot'));
    }

    public function update(Request $request, Timeslots $timeslot)
    {
        $validated_data = $request->validate([
            'day' => 'required|string',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);

        $timeslot->update($validated_data);

        return redirect()->route('timeslots.index')->with('success', ['message' =>  'Timeslot has been updated']);
    }

    public function destroy(Timeslots $timeslot)
    {
        $timeslot->delete();

        return redirect()->route('timeslots.index')->with('success', ['message' =>  'Timeslot has been deleted']);
    }
}
