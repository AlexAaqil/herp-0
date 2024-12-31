<?php

namespace App\Http\Controllers;

use App\Models\Leaveouts;
use App\Services\StudentService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class LeaveoutsController extends Controller
{
    private $studentService;
    
    public function __construct(StudentService $studentService) {
        $this->studentService = $studentService;
    }

    public function index()
    {
        $leaveouts = Leaveouts::all();
        return view('admin.leaveouts.index', compact('leaveouts'));
    }
    
    public function create()
    {
        $students = $this->studentService->getStudents();
        return view('admin.leaveouts.create', compact('students'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => ['required', Rule::in(Leaveouts::CATEGORIES)],
            'reason' => 'required|string',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
            'student_id' => 'required|exists:students,id',
        ]);

        Leaveouts::create($validated);

        return redirect()->route('leaveouts.index')->with('success', ['message' => 'Leaveout has been added.']);
    }
    
    public function edit(Leaveouts $leaveout)
    {
        $students = $this->studentService->getStudents();
        return view('admin.leaveouts.edit', compact('students', 'leaveout'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Leaveouts $leaveout)
    {
        $validated = $request->validate([
            'category' => ['required', Rule::in(Leaveouts::CATEGORIES)],
            'reason' => 'required|string',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
            'student_id' => 'required|exists:students,id',
        ]);

        $leaveout->update($validated);

        return redirect()->route('leaveouts.index')->with('success', ['message' => 'Leaveout has been updated.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leaveouts $leaveout)
    {
        $leaveout->delete();
        
        return redirect()->route('leaveouts.index')->with('success', ['message' => 'Leaveout has been deleted.']);
    }
}
