<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Students;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard.index', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function student_login()
    {
        return view('auth.student_login');
    }

    public function login_student(Request $request)
    {
        $validated = $request->validate([
            'registration_number' => 'required|string|exists:students,registration_number',
        ]);

        $student = Students::where('registration_number', $validated['registration_number'])->first();

        if ($student) {
            session(['student_registration_number' => $student->registration_number]);
            return redirect()->route('student-details');
        }

        return redirect()->back()->withErrors(['registration_number' => 'Invalid registration number.']);
    }
}
