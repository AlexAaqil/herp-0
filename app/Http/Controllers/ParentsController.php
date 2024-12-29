<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ParentsController extends Controller
{
    public function index()
    {
        $parents = Parents::orderBy('first_name')->get();
        return view('admin.parents.index', compact('parents'));
    }

    public function create()
    {
        return view('admin.parents.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:80'],
            'last_name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:parents,email'],
            'phone_main' => ['required', 'max:30', 'unique:parents,phone_main','regex:/^(07|01)\d{8,}$/'],
            'phone_other' => ['nullable', 'max:30','regex:/^(07|01)\d{8,}$/'],
            'address' => ['nullable', 'string'],
        ], [
            'phone_main.regex' => 'The phone number must start with 07 or 01',
            'phone_other.regex' => 'The phone number must start with 07 or 01',
            'phone_main.unique' => 'That phone number exists. Use another one.',
            'phone_other.unique' => 'That phone number exists. Use another one.',
        ]);

        $validated['password'] = Hash::make('parent1234');

        Parents::create($validated);

        return redirect()->route('students.create')->with('success', ['message' => 'Parent has been added.']);
    }
    public function edit(Parents $parent)
    {
        return view('admin.parents.edit', compact('parent'));
    }

    public function update(Request $request, Parents $parent)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:80'],
            'last_name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:parents,email,'.$parent->id],
            'phone_main' => ['required', 'max:30', 'unique:parents,phone_main,'.$parent->id,'regex:/^(07|01)\d{8,}$/'],
            'phone_other' => ['nullable', 'max:30','regex:/^(07|01)\d{8,}$/'],
            'address' => ['nullable', 'string'],
        ], [
            'phone_main.regex' => 'The phone number must start with 07 or 01',
            'phone_other.regex' => 'The phone number must start with 07 or 01',
            'phone_main.unique' => 'That phone number exists. Use another one.',
            'phone_other.unique' => 'That phone number exists. Use another one.',
        ]);

        $parent->update($validated);

        return redirect()->route('parents.index')->with('success', ['message' => 'Parent has been updated.']);
    }

    public function destroy(Parents $parent)
    {
        $parent->delete();

        return redirect()->route('parents.index')->with('success', ['message' => 'Parent has been deleted.']);
    }
}
