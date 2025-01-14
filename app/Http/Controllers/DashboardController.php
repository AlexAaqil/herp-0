<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\Parents;
use App\Models\ClassSections;
use App\Models\Dorm;
use App\Models\Subjects;
use App\Models\UserMessage;
use App\Models\Payments;
use App\Models\PaymentRecords;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user_level = Auth()->user()->user_level;

        if ($user_level == 2) {
            return redirect()->route('accountant.dashboard');
        } else if ($user_level == 0 || $user_level == 1) {
            return redirect()->route('admin.dashboard');
        } else if ($user_level == 3) {
            return redirect()->route('teacher.dashboard');
        } else if ($user_level == 4) {
            return redirect()->route('storekeeper.dashboard');
        } else {
            return redirect()->back();
        }
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function admin_dashboard()
    {
        $count_admins = User::whereIn('user_level', [0, 1])->count();
        $count_teachers = User::where('user_level', 3)->count();
        $count_accountants = User::where('user_level', 2)->count();
        $count_students = Student::count();
        $count_parents = Parents::count();
        $count_classes = ClassSections::count();
        $count_dorms = Dorm::count();
        $count_subjects = Subjects::count();
        $count_user_messages = UserMessage::count();
        $count_blogs = Blog::count();

        $total_payments_expected = DB::table('payment_records')
            ->join('payments', 'payment_records.payment_id', '=', 'payments.id')
            ->sum('payments.amount');
        $total_payments_made = DB::table('payment_records')
            ->sum('payment_records.amount_paid');
        $total_pending_payments = DB::table('payment_records')
        ->sum('payment_records.balance');

        return view('admin.dashboard', compact(
            'count_admins',
            'count_teachers',
            'count_accountants',
            'count_students',
            'count_parents',
            'count_classes',
            'count_dorms',
            'count_subjects',
            'count_user_messages',
            'count_blogs',

            'total_payments_expected',
            'total_payments_made',
            'total_pending_payments',
        ));
    }

    public function accountant_dashboard()
    {
        $count_students = Student::count();
        $count_classes = ClassSections::count();
        $count_payments = PaymentRecords::count();
        
        $total_payments_expected = DB::table('payment_records')
            ->join('payments', 'payment_records.payment_id', '=', 'payments.id')
            ->sum('payments.amount');
        $total_payments_made = DB::table('payment_records')
            ->sum('payment_records.amount_paid');
        $total_pending_payments = DB::table('payment_records')
        ->sum('payment_records.balance');
        return view('dashboards/accountant_dashboard', compact(
            'count_classes',
            'count_students',
            'count_payments',

            'total_payments_expected',
            'total_payments_made',
            'total_pending_payments',
        ));
    }

    public function teacher_dashboard()
    {
        $count_students = Student::count();
        $count_classes = ClassSections::count();
        $count_subjects = Subjects::count();
        return view('dashboards.teacher_dashboard', compact(
            'count_students',
            'count_classes',
            'count_subjects',
        ));
    }

    public function storekeeper_dashboard()
    {
        $count_students = Student::count();
        $count_classes = ClassSections::count();
        $count_subjects = Subjects::count();
        return view('dashboards.storekeeper_dashboard', compact(
            'count_students',
            'count_classes',
            'count_subjects',
        ));
    }
}
