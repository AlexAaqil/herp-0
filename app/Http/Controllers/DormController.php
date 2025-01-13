<?php

namespace App\Http\Controllers;

use App\Models\Dorm;
use Illuminate\Http\Request;

class DormController extends Controller
{
    public function index()
    {
        $dorms = Dorm::orderBy('title')->get();

        return view('admin.dorms.index', compact('dorms'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:dorms,title',
        ]);

        Dorm::create($validated);

        return redirect()->route('dorms.index')->with('success', ['message' => 'Dorm has been added.']);
    }

    public function edit(Dorm $dorm)
    {
        return view('admin.dorms.edit', compact('dorm'));
    }

    public function update(Request $request, Dorm $dorm)
    {
        $validated = $request->validate([
            'title' => 'required|unique:dorms,title,'.$dorm->id,
        ]);

        $dorm->update($validated);

        return redirect()->route('dorms.index')->with('success', ['message' => 'Dorm has been updated.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dorm $dorm)
    {
        $dorm->delete();

        return redirect()->route('dorms.index')->with('success', ['message' => 'Dorm has been deleted.']);
    }
}
