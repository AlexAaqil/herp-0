<?php

namespace App\Http\Controllers;

use App\Models\UserLevel;
use Illuminate\Http\Request;

class UserLevelController extends Controller
{
    public function index()
    {
        $user_levels = UserLevel::orderBy('user_level')->get();
        return view('admin.user_levels.index', compact('user_levels'));
    }

    public function create()
    {
        return view('admin.user_levels.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_level' => 'required|numeric|unique:user_levels,user_level',
            'title' => 'required|string|max:80|unique:user_levels,title',
        ]);

        UserLevel::create($validated);

        return redirect()->route('user-levels.index')->with('success', ['message' => 'User Level has been added.']);
    }

    public function edit(UserLevel $user_level)
    {
        return view('admin.user_levels.edit', compact('user_level'));
    }

    public function update(Request $request, UserLevel $user_level)
    {
        $validated = $request->validate([
            'user_level' => 'required|numeric|unique:user_levels,user_level,' . $user_level->id,
            'title' => 'required|string|max:80|unique:user_levels,title',
        ]);

        $user_level->update($validated);

        return redirect()->route('user-levels.index')->with('success', ['message' => 'User Level has been updated.']);
    }

    public function destroy(UserLevel $userLevel)
    {
        //
    }
}
