<?php

namespace App\Http\Controllers;

use App\Models\ExamResult;
use App\Models\Exam;
use App\Models\Subjects;
use App\Models\Grades;
use Illuminate\Http\Request;
use App\Services\StudentService;

class ExamResultController extends Controller
{
    private $studentService;
    
    public function __construct(StudentService $studentService) {
        $this->studentService = $studentService;
    }

    public function index()
    {
        $students = $this->studentService->getStudents();
        $exams = Exam::all();
        $subjects = Subjects::orderBy('title')->get();
        $results = ExamResult::with(['student', 'exam', 'subject', 'grade'])->get();
        return view('admin.exams.exam_results.index', compact('students', 'results', 'exams', 'subjects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'exam_id' => 'required|exists:exams,id',
            'subject_id' => 'required|exists:subjects,id',
            'marks' => 'required|integer|min:0|max:100',
        ]);

        $validated['grade'] = ExamResult::determineGrade($validated['marks']);

        ExamResult::create($validated);

        return redirect()->back()->with('success', ['message' => 'Marks have been added.']);
    }

    public function edit(ExamResult $exam_result)
    {
        $students = $this->studentService->getStudents();
        $exams = Exam::all();
        $subjects = Subjects::orderBy('title')->get();
        return view('admin.exams.exam_results.edit', compact('exam_result', 'students', 'exams', 'subjects'));
    }

    public function update(Request $request, ExamResult $exam_result)
    {
        $validated = $request->validate([
            'exam_id' => 'required|exists:exams,id',
            'subject_id' => 'required|exists:subjects,id',
            'marks' => 'required|integer|min:0|max:100',
        ]);

        $validated['grade'] = ExamResult::determineGrade($validated['marks']);

        $exam_result->update($validated);

        return redirect()->route('exam-results.index')->with('success', ['message' => 'Result has been updated.']);
    }

    public function destroy(ExamResult $exam_result)
    {
        $exam_result->delete();

        return redirect()->route('exam-results.index')->with('success', ['message' => 'Result has been deleted.']);
    }
}
