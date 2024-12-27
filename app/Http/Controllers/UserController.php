<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\User;
use App\Models\UserLevel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

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
            'phone_main' => ['required', 'max:30'],
            'user_level' => ['required'],
            'emp_code' => ['nullable'],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_main' => $request->phone_main ?? 254746055487,
            'user_level' => $request->user_level,
            'emp_code' => $request->emp_code,
            'password' => Hash::make($request->password ?? 'hsms1234'),
        ]);

        Mail::to($user->email)->send(new WelcomeEmail($user));

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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class.',email,'.$user->id],
            'phone_main' => ['required', 'max:30'],
            'user_level' => ['required'],
            'emp_code' => ['nullable','unique:'.User::class.',emp_code,'.$user->id],
            'password' => ['nullable', 'confirmed', $request->password ? Rules\Password::defaults() : ''],
        ]);

        $user->update([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone_main' => $validated['phone_main'],
            'user_level' => $validated['user_level'],
            'emp_code' => $validated['emp_code'] ?? null,
            'password' => $validated['password'] ? bcrypt($validated['password']) : $user->password,
        ]);        

        return redirect()->route('users.index')->with('success', ['message' => 'User has been updated']);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', ['message' => 'User has been deleted']);
    }
}
