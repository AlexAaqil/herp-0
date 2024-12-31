<?php

namespace App\Http\Controllers;

use App\Models\Disciplinaries;
use App\Services\StudentService;
use Illuminate\Http\Request;
use Auth;

class DisciplinariesController extends Controller
{
    private $studentService;
    
    public function __construct(StudentService $studentService) {
        $this->studentService = $studentService;
    }

    public function index()
    {
        $disciplinaries = Disciplinaries::all();
        return view('admin.disciplinaries.index', compact('disciplinaries'));
    }

    public function create()
    {
        $students = $this->studentService->getStudents();
        return view('admin.disciplinaries.create', compact('students'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|integer|exists:students,id',
            'category' => 'required|in:minor,major',
            'comment' => 'required|string',
        ]);

        Disciplinaries::create($validated);

        return redirect()->route('disciplinaries.index')->with('success', ['message' => 'Disciplinary has been added.']);
    }

    public function edit(Disciplinaries $disciplinary)
    {
        $students = $this->studentService->getStudents();
        return view('admin.disciplinaries.edit', compact('students', 'disciplinary'));
    }

    public function update(Request $request, Disciplinaries $disciplinary)
    {
        $validated = $request->validate([
            'student_id' => 'required|integer|exists:students,id',
            'category' => 'required|in:minor,major',
            'comment' => 'required|string',
        ]);

        $disciplinary->update($validated);

        return redirect()->route('disciplinaries.index')->with('success', ['message' => 'Disciplinary has been updated.']);
    }

    public function destroy(Disciplinaries $disciplinary)
    {
        $disciplinary->delete();
        
        return redirect()->route('disciplinaries.index')->with('success', ['message' => 'Disciplinary has been deleted.']);
    }
}
