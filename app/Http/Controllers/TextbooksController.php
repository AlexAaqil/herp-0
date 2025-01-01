<?php

namespace App\Http\Controllers;

use App\Models\Textbooks;
use App\Services\StudentService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TextbooksController extends Controller
{
    private $studentService;
    
    public function __construct(StudentService $studentService) {
        $this->studentService = $studentService;
    }

    public function index()
    {
        $textbooks = Textbooks::orderBy('book_name')->get();
        return view('admin.textbooks.index', compact('textbooks'));
    }

    public function create()
    {
        $students = $this->studentService->getStudents();
        return view('admin.textbooks.create', compact('students'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'book_number' => 'required|string|unique:textbooks,book_number',
            'book_name' => 'required|string|max:180',
            'date_issued' => 'nullable|date',
            'date_returned' => 'nullable|date|after:date_issued',
            'status' => ['required', Rule::in(Textbooks::STATUSES)],
        ]);

        Textbooks::create($validated);

        return redirect()->route('textbooks.index')->with('success', ['message' => 'Textbook has been added.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Textbooks $textbooks)
    {
        //
    }

    public function edit(Textbooks $textbook)
    {
        $students = $this->studentService->getStudents();
        return view('admin.textbooks.edit', compact('students', 'textbook'));
    }

    public function update(Request $request, Textbooks $textbook)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'book_number' => 'required|string|unique:textbooks,book_number,'.$textbook->id,
            'book_name' => 'required|string|max:180',
            'date_issued' => 'nullable|date',
            'date_returned' => 'nullable|date|after:date_issued',
            'status' => ['required', Rule::in(Textbooks::STATUSES)],
        ]);

        $textbook->update($validated);

        return redirect()->route('textbooks.index')->with('success', ['message' => 'Textbook has been updated.']);
    }

    public function destroy(Textbooks $textbook)
    {
        $textbook->delete();

        return redirect()->route('textbooks.index')->with('success', ['message' => 'Textbook has been deleted.']);
    }
}
