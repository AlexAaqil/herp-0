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

    public function index(Request $request)
    {   
        $students = $this->studentService->getStudents();
        $exams = Exam::all();
        $exam_id = $request->get('exam_id');
        $subjects = Subjects::orderBy('title')->get();

        $results = collect();
        if($exam_id) {
            $results = ExamResult::where('exam_id', $exam_id)->get();
        }

        return view('admin.exams.exam_results.index', compact('students', 'results', 'exams', 'exam_id', 'subjects'));
    }

    public function create(Request $request)
    {
        $students = $this->studentService->getStudents();
        $exams = Exam::all();
        $exam_id = $request->query('exam_id');
        $subjects = Subjects::orderBy('title')->get();
        $results = ExamResult::with(['student', 'exam', 'subject', 'grade'])->where('exam_id', $exam_id)->get();
        return view('admin.exams.exam_results.create', compact('students', 'results', 'exams', 'exam_id', 'subjects'));
    }

    public function store(Request $request)
    {
        $exam_id = $request->input('exam_id');
        $marks = $request->input('marks');
    
        foreach ($marks as $student_id => $subjects) {
            foreach ($subjects as $subject_id => $marks) {
                // Find or create an exam result for the student, exam, and subject
                $examResult = ExamResult::firstOrNew([
                    'student_id' => $student_id,
                    'exam_id' => $exam_id,
                    'subject_id' => $subject_id,
                ]);
    
                $examResult->marks = $marks;
                $examResult->grade = ExamResult::determineGrade($marks);
                $examResult->save();
            }
        }
    
        return redirect()->route('exam-results.index', ['exam_id' => $exam_id])->with('success', 'Marks updated successfully!');
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

        $existingResult = ExamResult::where('student_id', $exam_result->student_id)
            ->where('exam_id', $validated['exam_id'])
            ->where('subject_id', $validated['subject_id'])
            ->where('id', '!=', $exam_result->id) // Exclude current record
            ->first();

        if ($existingResult) {
            return redirect()->back()->with('error', ['message' => 'This result already exists.']);
        }

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
