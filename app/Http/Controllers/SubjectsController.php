<?php

namespace App\Http\Controllers;

use App\Models\Subjects;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function index()
    {
        $subjects = Subjects::orderBy('title')->get();
        return view('admin.subjects.index', compact('subjects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100|unique:subjects,title',
            'short_name' => 'nullable|string|max:10',
            'code' => 'nullable|string|max:20|unique:subjects,code',
        ]);

        Subjects::create($validated);

        return redirect()->back()->with('success', ['message' => 'Subject has been added.']);
    }

    public function edit(Subjects $subject)
    {
        return view('admin.subjects.edit', compact('subject'));
    }

    public function update(Request $request, Subjects $subject)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100|unique:subjects,title,'.$subject->id,
            'short_name' => 'nullable|string|max:10',
            'code' => 'nullable|string|max:20|unique:subjects,code,'.$subject->id,
        ]);

        $subject->update($validated);

        return redirect()->route('subjects.index')->with('success', ['message' => 'Subject has been updated']);
    }

    public function destroy(Subjects $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index')->with('success', ['message' => 'Subject has been deleted.']);
    }
}
