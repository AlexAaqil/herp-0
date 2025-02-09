<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserLevel;
use App\Models\ClassSections;
use App\Models\Subjects;
use App\Models\Timeslots;

use Illuminate\Validation\Rules;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = User::where('user_level', 3)->get();
    
        return view('teachers.index', compact('teachers'));
    }

    public function edit(User $teacher)
    {
        $classSections = ClassSections::all();
        $subjects = Subjects::all();
        $timeslots = Timeslots::all();
        $user_levels = UserLevel::get();
        $teacher = $teacher->load('userLevel', 'sectionSubjectTeachers.timeslot', 'sectionSubjectTeachers.subject', 'sectionSubjectTeachers.classSection');

        return view('teachers.edit', compact('teacher', 'user_levels', 'classSections', 'subjects', 'timeslots'));
    }

    public function update(Request $request, User $teacher)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:80'],
            'last_name' => ['required', 'string', 'max:120'],
            'phone_main' => ['required', 'max:30', 'unique:users,phone_main,'.$teacher->id, 'regex:/^(07|01)\d{8,}$/'],
            'user_level' => ['required', 'exists:user_levels,id'],
            'emp_code' => ['nullable', 'unique:'.User::class.',emp_code,'.$teacher->id],
            'password' => ['nullable', 'confirmed', $request->password ? Rules\Password::defaults() : ''],
        ], [
            'phone_main.regex' => 'The phone number must start with 07 or 01',
            'phone_main.unique' => 'That phone number has been used.',
        ]);
    
        // Prepare fields for update
        $update_fields = [
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'phone_main' => $validated['phone_main'],
            'user_level' => $validated['user_level'],
            'emp_code' => $validated['emp_code'] ?? null,
        ];
    
        // Handle password
        if ($request->password) {
            $update_fields['password'] = bcrypt($request->password);
        }

        // Update teacher
        $teacher->update($update_fields);
    
        return redirect()->route('teachers.index')->with('success', ['message' => 'User has been updated']);
    }
}
