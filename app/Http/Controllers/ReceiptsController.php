<?php

namespace App\Http\Controllers;

use App\Models\PaymentRecords;
use App\Models\Payments;
use App\Models\Student;
use Illuminate\Http\Request;

class ReceiptsController extends Controller
{
    public function selectTermYear($student_id)
    {
        $student = Student::findOrFail($student_id);

        return view('admin.payments.receipts.select', compact('student'));
    }

    public function generate(Request $request, $student_id)
    {
        $validated = $request->validate([
            'year' => 'required|integer|min:2000|max:' . now()->year,
            'term' => 'required|integer|min:1|max:3',
        ]);

        $student = Student::findOrFail($student_id);

        $payment = Payments::where('year', $validated['year'])
        ->where('term', $validated['term'])
        ->first();

        $paymentRecords = PaymentRecords::with('payment')
            ->where('student_id', $student_id)
            ->whereHas('payment', function ($query) use ($validated) {
                $query->where('year', $validated['year'])->where('term', $validated['term']);
            })
            ->get();
        
        session([
            'student' => $student,
            'paymentRecords' => $paymentRecords,
            'validated' => $validated,
            'payment' => $payment,
        ]);
        
        return view('admin.payments.receipts.receipt', compact('paymentRecords', 'validated', 'student', 'payment'));
    }

    public function print(Request $request)
    {
        $student = session('student');
        $paymentRecords = session('paymentRecords');
        $payment = session('payment');

        if (!$student || !$paymentRecords) {
            return redirect()->route('payment-records.index')->with('error', ['message' => 'Payment record data not found.']);
        }
        
        return view('admin.payments.receipts.print', compact('student', 'paymentRecords', 'payment'));
    }
}
