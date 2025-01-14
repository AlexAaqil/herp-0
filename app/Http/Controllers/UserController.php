<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\User;
use App\Models\UserLevel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('first_name')->get();

        return view("admin.users.index", compact("users"));
    }

    public function create()
    {
        $user_levels = UserLevel::get();
        return view('admin.users.create', compact('user_levels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:80'],
            'last_name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone_main' => ['required', 'max:30', 'unique:users,phone_main','regex:/^(07|01)\d{8,}$/'],
            'user_level' => ['required', 'exists:user_levels,id'],
            'emp_code' => ['nullable'],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ], [
            'phone_main.regex' => 'The phone number must start with 07 or 01',
            'phone_main.unique' => 'That phone number has been used.',
        ]);

        $generated_password = $request->password ?? Str::random(8);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_main' => $request->phone_main ?? 254746055487,
            'user_level' => $request->user_level,
            'emp_code' => $request->emp_code,
            'password' => Hash::make($request->password ?? $generated_password),
        ]);

        Mail::to($user->email)->send(new WelcomeEmail($user, $generated_password ?? $request->password));

        return redirect(route('users.index'));
    }

    public function edit(User $user)
    {
        $user_levels = UserLevel::get();
        $user->load('userLevel');

        return view('admin.users.edit', compact('user', 'user_levels'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:80'],
            'last_name' => ['required', 'string', 'max:120'],
            'phone_main' => ['required', 'max:30', 'unique:users,phone_main,'.$user->id, 'regex:/^(07|01)\d{8,}$/'],
            'user_level' => ['required', 'exists:user_levels,id'],
            'emp_code' => ['nullable', 'unique:'.User::class.',emp_code,'.$user->id],
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

        // Update user
        $user->update($update_fields);
    
        return redirect()->route('users.index')->with('success', ['message' => 'User has been updated']);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', ['message' => 'User has been deleted']);
    }

    public function teachers_index()
    {
        $teachers = User::where('user_level', 3)->get();

        return view('admin.users.teachers', compact('teachers'));
    }
}
