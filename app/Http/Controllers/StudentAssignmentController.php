<?php

namespace App\Http\Controllers;

use App\Models\ClassSections;
use App\Models\StudentAssignment;
use App\Models\Subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class StudentAssignmentController extends Controller
{
    public function index()
    {
        $assignments = StudentAssignment::with('classSection', 'subject')->where('teacher_id', auth()->id())
        ->orderByDesc('date_issued')
        ->get();

        return view('admin.assignments.index', compact('assignments'));
    }

    public function create()
    {
        $classes = ClassSections::all();
        $subjects = Subjects::all();

        return view('admin.assignments.create', compact('classes', 'subjects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_section_id' => 'required|exists:class_sections,id',
            'subject_id' => 'required|exists:subjects,id',
            'date_issued' => 'required|date',
            'deadline' => 'required|date|after_or_equal:date_issued',
            'description' => 'required|string|max:2000',
            'uploaded_assignment' => 'required|file|mimes:pdf,docx,txt,epub,jpg,jpeg,png|max:2048',
        ]);

        $class_section = ClassSections::find($request->class_section_id);
        $subject = Subjects::find($request->subject_id);

        if (!$class_section || !$subject) {
            return back()->with('error', ['message' => 'Class or subject not found.']);
        }

        if ($request->hasFile('uploaded_assignment')) {
            $file_extension = $request->file('uploaded_assignment')->getClientOriginalExtension();

            $file_name = sprintf(
                '%s-%s-%s-%s-%s.%s',
                $class_section->title,
                $subject->title,
                'Assignment',
                Carbon::now()->format('Ymd'),
                Str::random(4),
                $file_extension,
            );

            $validated['uploaded_assignment'] = $request->file('uploaded_assignment')->storeAs('assignments', $file_name, 'public');
        }

        $validated['teacher_id'] = auth()->id();

        StudentAssignment::create($validated);

        return redirect()->route('assignments.index')->with('success', ['message' => 'Assignment has been uploaded.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentAssignment $studentAssignment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentAssignment $studentAssignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentAssignment $studentAssignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentAssignment $studentAssignment)
    {
        //
    }

    public function download(StudentAssignment $assignment)
    {
        $filePath = storage_path('app/public/' . $assignment->uploaded_assignment);
        
        // Check if the file exists
        if (file_exists($filePath)) {
            // Get the custom filename (optional)
            $fileName = basename($filePath);  // You can customize this further if needed
            
            // Return the file as a download response
            return response()->download($filePath, $fileName);
        } else {
            return redirect()->route('assignments.index')->with('error', 'File not found.');
        }
    }
}
