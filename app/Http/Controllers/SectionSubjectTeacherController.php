<?php

namespace App\Http\Controllers;

use App\Models\ClassSections;
use App\Models\SectionSubjectTeacher;
use App\Models\Subjects;
use App\Models\User;
use Illuminate\Http\Request;

class SectionSubjectTeacherController extends Controller
{
    public function index()
    {
        $assignments = SectionSubjectTeacher::with(['classSection', 'subject', 'teacher'])->get();
        $classSections = ClassSections::all();
        $subjects = Subjects::all();
        $teachers = User::where('user_level', 3)->get();
        return view('admin.section_subject_teachers.index', compact('assignments', 'classSections', 'subjects', 'teachers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_section_id' => 'required|exists:class_sections,id',
            'subject_id' => 'required|exists:subjects,id',
            'teacher_id' => 'required|exists:users,id',
        ]);

        SectionSubjectTeacher::create($validated);

        return redirect()->route('subject-teachers.index')->with('success', ['message' => 'Teacher has been assigned to the subject.']);
    }

    public function edit(SectionSubjectTeacher $subject_teacher)
    {
        $classSections = ClassSections::all();
        $subjects = Subjects::all();
        $teachers = User::where('user_level', 3)->get();
        return view('admin.section_subject_teachers.edit', compact('subject_teacher', 'classSections', 'subjects', 'teachers'));
    }

    public function update(Request $request, SectionSubjectTeacher $subject_teacher)
    {
        $validated = $request->validate([
            'class_section_id' => 'required|exists:class_sections,id',
            'subject_id' => 'required|exists:subjects,id',
            'teacher_id' => 'required|exists:users,id',
        ]);

        $subject_teacher->update($validated);

        return redirect()->route('subject-teachers.index')->with('success', ['message' => 'Teacher has been assigned to the subject.']);
    }

    public function destroy(SectionSubjectTeacher $subject_teacher)
    {
        $subject_teacher->delete();

        return redirect()->route('subject-teachers.index')->with('success', ['message' => 'Teacher subject has been deleted.']);
    }
}
