<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::orderByDesc('year')->orderBy('term')->get();
        return view('admin.exams.exams.index', compact('exams'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'term' => 'required|integer|min:1|max:3',
        ]);

        Exam::create($validated);

        return redirect()->back()->with('success', ['message' => 'Exam has been added.']);
    }

    public function edit(Exam $exam)
    {
        return view('admin.exams.exams.edit', compact('exam'));
    }

    public function update(Request $request, Exam $exam)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'term' => 'required|integer|min:1|max:3',
        ]);

        $exam->update($validated);

        return redirect()->route('exams.index')->with('success', ['message' => 'Exam has been updated.']);
    }

    public function destroy(Exam $exam)
    {
        $exam->delete();

        return redirect()->route('exams.index')->with('success', ['message' => 'Exam has been deleted.']);
    }
}
