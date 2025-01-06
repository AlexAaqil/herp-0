<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Students;

class Student
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('student_registration_number')) {
            $student = Students::where('registration_number', session('student_registration_number'))->first();

            if (!$student) {
                return redirect('/student-login')->with('error', 'Student not found.');
            }

            // Attach the student to the request object
            $request->merge(['student' => $student]);
        } else {
            return redirect('/student-login')->with('error', 'Please log in to access this page.');
        }

        return $next($request);
    }
}
