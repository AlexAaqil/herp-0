<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LeaveController extends Controller
{
    public function index()
    {
        $user_level = auth()->user()->user_level;
        if ($user_level != 0 && $user_level != 1) {
            $leaves = Leave::where('user_id', auth()->user()->id)
            ->orderBy('to_date')
            ->get();
        } else {
            $leaves = Leave::with('user')
            ->orderByRaw("FIELD(status, 'pending', 'rejected', 'approved')")
            ->orderBy('to_date')
            ->get();
        }

        return view('admin.leaves.index', compact('leaves'));
    }

    public function create()
    {
        return view('admin.leaves.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => ['required', Rule::in(Leave::CATEGORIES)],
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
            'reason' => 'required|string',
        ]);

        $validated['user_id'] = auth()->user()->id;

        Leave::create($validated);

        return redirect()->route('leaves.index')->with('success', ['message' => 'Leave application has been sent.']);
    }

    public function edit(Leave $leave)
    {
        if ($leave->user_id !== auth()->id() && auth()->user()->user_level > 1) {
            abort(403, 'What are you trying to do?');
        }

        return view('admin.leaves.edit', compact('leave'));
    }

    public function update(Request $request, Leave $leave)
    {
        $validated = $request->validate([
            'category' => ['required', Rule::in(Leave::CATEGORIES)],
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
            'reason' => 'required|string',
            'status' => 'nullable|in:approved,rejected',
        ]);

        $leave->update($validated);

        return redirect()->route('leaves.index')->with('success', ['message' => 'Leave application has been updated.']);
    }

    public function destroy(Leave $leave)
    {
        $leave->delete();

        return redirect()->route('leaves.index')->with('success', ['message' => 'Leave application has been deleted.']);
    }
}
