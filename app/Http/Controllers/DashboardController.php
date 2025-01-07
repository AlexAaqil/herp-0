<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Students;
use App\Models\Parents;
use App\Models\UserMessage;
use App\Models\Blog;

class DashboardController extends Controller
{
    public function index()
    {
        $user_level = Auth()->user()->user_level;
        
        if($user_level == 2)
        {
            return redirect()->route('accountant.dashboard');
        }
        else if($user_level == 0 || $user_level == 1)
        {
            return redirect()->route('admin.dashboard');
        }
        else if($user_level == 3)
        {
            return redirect()->route('teacher.dashboard');
        }
        else
        {
            return redirect()->back();
        }
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function admin_dashboard()
    {
        $count_admins = User::whereIn('user_level', [0,1])->count();
        $count_teachers = User::where('user_level', 3)->count();
        $count_accountants = User::where('user_level', 2)->count();
        $count_students = Students::count();
        $count_parents = Parents::count();
        $count_user_messages = UserMessage::count();
        $count_blogs = Blog::count();

        return view('admin.dashboard', compact(
            'count_admins',
            'count_teachers',
            'count_accountants',
            'count_students',
            'count_parents',
            'count_user_messages',
            'count_blogs',
        ));
    }

    public function accountant_dashboard()
    {
        return view('dashboards.accountant_dashboard');
    }

    public function teacher_dashboard()
    {
        return view('dashboards.teacher_dashboard');
    }
}
