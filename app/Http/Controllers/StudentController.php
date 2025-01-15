<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ClassSections;
use App\Models\Parents;
use App\Models\StudentAssignment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;


class StudentController extends Controller
{
    private function getClassSections()
    {
        return ClassSections::orderBy('title')->get();
    }

    public function index()
    {
        $students = Student::all();
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
            'registration_number' => 'required|string|unique:students,registration_number',
            'first_name' => 'required|string|max:80',
            'last_name' => 'required|string|max:120',
            'gender' => 'required|in:M,F',
            'dob' => 'nullable|date|before:today',
            'dorm_id' => 'nullable|integer',
            'dorm_room_number' => 'nullable|string',
            'year_admitted' => 'nullable|digits:4|integer',
            'graduation_status' => 'required|boolean',
            'graduation_date' => 'nullable|date',
            'class_section_id' => 'required|integer',
            'password' => ['nullable', Rules\Password::defaults()],
            'image' => 'nullable|file|image|max:1024',
        ]);

        if($request->hasFile('image')) {
            $file = $request->file('image');

            $student_details = $request->input('registration_number').'_'.$request->input('first_name').'_'.$request->input('last_name');
            $file_name = "{$student_details}.{$file->extension()}";

            $file_path = $file->storeAs('students', $file_name, 'public');
            $validated['image'] = $file_path;
        }
        
        if ($request->has('parent_id')) {
            $request->validate([
                'parent_id' => 'array',
                'parent_id.*' => 'exists:parents,id',
            ]);
        }

        $validated['password'] = Hash::make($request->password ?? 'st123456');

        $student = new Student($validated);
        $student->save();

        if ($request->has('parent_id')) {
            $student->parents()->attach($request->parent_id); // Attach parents to student
        }

        return redirect()->route('students.index')->with('success', ['message' => 'Student has been admitted']);
    }

    public function edit(Student $student)
    {
        $parents = Parents::orderBy('first_name')->get();
        $class_sections = $this->getClassSections();
        return view('admin.students.edit', compact('student', 'class_sections', 'parents'));
    }

    public function update(Student $student, Request $request)
    {
        $validated = $request->validate([
            'registration_number' => 'required|string|unique:students,registration_number,' . $student->id,
            'first_name' => 'required|string|max:80',
            'last_name' => 'required|string|max:120',
            'gender' => 'required|in:M,F',
            'dob' => 'nullable|date|before:today',
            'dorm_id' => 'nullable|integer',
            'dorm_room_number' => 'nullable|string',
            'year_admitted' => 'nullable|digits:4|integer',
            'graduation_status' => 'required|boolean',
            'graduation_date' => 'nullable|date',
            'class_section_id' => 'required|integer',
            'password' => ['nullable', Rules\Password::defaults()],
            'image' => 'nullable|file|image|max:1024',
        ]);

        if($request->hasFile('image')) {
            if($student->image && \Storage::disk('public')->exists($student->image)) {
                \Storage::disk('public')->delete($student->image);
            }

            $file = $request->file('image');

            $student_details = $request->input('registration_number').'_'.$request->input('first_name').'_'.$request->input('last_name');
            $file_name = "{$student_details}.{$file->extension()}";

            $file_path = $file->storeAs('students', $file_name, 'public');
            $validated['image'] = $file_path;
        }

        $validated['password'] = Hash::make($request->password ?? 'st123456');

        $student->update($validated);

        if ($request->has('parent_id')) {
            $request->validate([
                'parent_id' => 'array',
                'parent_id.*' => 'exists:parents,id',
            ]);
        }

        // Update pivot table with parents (if provided)
        if ($request->has('parent_id')) {
            $student->parents()->sync($request->parent_id); // Sync parents to ensure proper relationship
        }

        return redirect()->back()->with('success', ['message' => 'Student details have been updated.']);
    }

    public function destroy(Student $student)
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

    public function payments(Request $request)
    {
        $student = $request->student;
        $payments = $student->paymentRecords;

        return view('students.payments', compact('student', 'payments'));
    }

    public function results(Request $request)
    {
        $student = $request->student;
        $results = $student->examResults;

        return view('students.results', compact('student', 'results'));
    }

    public function assignments(Request $request)
    {
        $student = $request->student;
        $assignments = StudentAssignment::with('classSection', 'subject')
        ->where('class_section_id', $student->class_section_id)
        ->orderByDesc('date_issued')
        ->get();

        return view('students.assignments', compact('student', 'assignments'));
    }

    public function logout_student()
    {
        session()->forget('student_registration_number');
        return redirect()->route('student-login');
    }
}
