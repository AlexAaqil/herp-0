<?php

namespace App\Http\Controllers;

use App\Models\ClassSections;
use Illuminate\Http\Request;

class ClassSectionsController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_id' => 'required',
            'title' => 'required|string|unique:class_sections,title',
            'teacher_id' => 'nullable',
        ]);

        ClassSections::create($validated);

        return redirect()->route('classes.edit', $validated['class_id'])->with('success', ['message' => 'Class section has been added.']);
    }

    public function edit(ClassSections $class_section)
    {
        return view('admin.classes.edit_class_section', compact('class_section'));
    }

    public function update(Request $request, ClassSections $class_section)
    {
        $validated = $request->validate([
            'title' => 'required|string|unique:class_sections,title,' . $class_section->id,
            'teacher_id' => 'nullable',
        ]);

        $class_section->update($validated);

        return redirect()->route('classes.index')->with('success', ['message' => 'Class Section has been updated.']);
    }

    public function destroy(ClassSections $class_section)
    {
        $class_section->delete();

        return redirect()->route('classes.index')->with('success', ['message' => 'Class Section has been deleted.']);
    }
}
