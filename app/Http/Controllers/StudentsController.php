<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\ClassSections;
use App\Models\Parents;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;


class StudentsController extends Controller
{
    private function getClassSections()
    {
        return ClassSections::orderBy('title')->get();
    }

    public function index()
    {
        $students = Students::all();
        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        $parents = Parents::all();
        $class_sections = $this->getClassSections();
        return view('admin.students.create', compact('class_sections', 'parents'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'registration_number' => 'required|string|unique:Students,registration_number',
            'first_name' => 'required|string|max:80',
            'last_name' => 'required|string|max:120',
            'dob' => 'nullable|date|before:today',
            'dorm_id' => 'nullable|integer',
            'dorm_room_number' => 'nullable|string',
            'year_admitted' => 'nullable|digits:4|integer',
            'graduation_status' => 'required|boolean',
            'graduation_date' => 'nullable|date',
            'class_section_id' => 'required|integer',
            'parent_id' => 'nullable|array',
            'parent_id.*' => 'exists:parents,id',
            'password' => ['nullable', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($request->password ?? 'st123456');

        $student = new Students($validated);
        $student->save();

        if($request->has('parent_id')) {
            $student->parents()->attach($request->parent_id);
        }

        return redirect()->route('students.index')->with('success', ['message' => 'Student has been admitted']);
    }

    public function edit(Students $student)
    {
        $parents = Parents::orderBy('first_name')->get();
        $class_sections = $this->getClassSections();
        return view('admin.students.edit', compact('student', 'class_sections', 'parents'));
    }

    public function update(Students $student, Request $request)
    {
        $validated = $request->validate([
            'registration_number' => 'required|string|unique:Students,registration_number,'.$student->id,
            'first_name' => 'required|string|max:80',
            'last_name' => 'required|string|max:120',
            'dob' => 'nullable|date|before:today',
            'dorm_id' => 'nullable|integer',
            'dorm_room_number' => 'nullable|string',
            'year_admitted' => 'nullable|digits:4|integer',
            'graduation_status' => 'required|boolean',
            'graduation_date' => 'nullable|date',
            'class_section_id' => 'required|integer',
            'parent_id' => 'nullable|integer',
            'password' => ['nullable', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($request->password ?? 'st123456');

        $student->update($validated);

        return redirect()->route('students.index')->with('success', ['message' => 'Student details have been updated.']);
    }

    public function destroy(Students $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', ['message' => 'Student has been deleted.']);
    }

    public function details(Request $request)
    {
        $student = $request->student;

        return view('students.index', compact('student'));
    }

    public function textbooks(Request $request)
    {
        $student = $request->student;
        $textbooks = $student->textbooks;

        return view('students.textbooks', compact('student', 'textbooks'));
    }

    public function leavouts(Request $request)
    {
        $student = $request->student;
        $leaveouts = $student->leaveouts;

        return view('students.leaveouts', compact('student', 'leaveouts'));
    }

    public function disciplinaries(Request $request)
    {
        $student = $request->student;
        $disciplinaries = $student->disciplinaries;

        return view('students.disciplinaries', compact('student', 'disciplinaries'));
    }

    public function student_logout()
    {
        session()->forget('student_registration_number');
        return redirect()->route('student-login');
    }
}
