<?php

namespace App\Http\Controllers;

use App\Models\Grades;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    public function index()
    {
        $grades = Grades::orderByDesc('max_marks')->get();
        return view('admin.grades.index', compact('grades'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'min_marks' => 'required|integer|min:0|max:100',
            'max_marks' => 'required|integer|min:0|max:100|gte:min_marks',
            'grade' => 'required|string|max:2|unique:grades,grade',
            'remarks' => 'required|string|max:180',
        ]);

        $validated['grade'] = strtoupper($validated['grade']);

        Grades::create($validated);

        return redirect()->back()->with('success', ['message' => 'Grade has been added.']);
    }

    public function edit(Grades $grade)
    {
        return view('admin.grades.edit', compact('grade'));
    }

    public function update(Request $request, Grades $grade)
    {
        $validated = $request->validate([
            'min_marks' => 'required|integer|min:0|max:100',
            'max_marks' => 'required|integer|min:0|max:100|gte:min_marks',
            'grade' => 'required|string|max:2|unique:grades,grade,'.$grade->id,
            'remarks' => 'required|string|max:180',
        ]);

        $validated['grade'] = strtoupper($validated['grade']);

        $grade->update($validated);

        return redirect()->route('grades.index')->with('success', ['message' => 'Grade has been updated.']);
    }

    public function destroy(Grades $grade)
    {
        $grade->delete();

        return redirect()->route('grades.index')->with('success', ['message' => 'Grade has been deleted.']);
    }
}
