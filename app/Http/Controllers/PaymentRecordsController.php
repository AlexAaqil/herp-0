<?php

namespace App\Http\Controllers;

use App\Models\PaymentRecords;
use App\Models\Payments;
use App\Models\ClassSections;
use App\Models\Classes;
use App\Models\Students;
use App\Models\Receipts;
use Illuminate\Http\Request;

class PaymentRecordsController extends Controller
{
    public function index(Request $request)
    {
        $class_section_id = $request->query('class_section_id');
        $class_sections = ClassSections::all();
        $classes = Classes::all();
    
        // Fetch students based on the selected class section
        $studentsQuery = Students::with(['studentClassSection', 'parents']);
        if ($class_section_id) {
            $studentsQuery->where('class_section_id', $class_section_id);
        }
        $students = $studentsQuery->get();
        
        // Fetch payments for the selected class section's class
        $payments = [];
        if ($class_section_id) {
            $class_id = ClassSections::find($class_section_id)->class_id;
            $payments = Payments::where('class_id', $class_id)->get();
        }
    
        return view('admin.payments.payment-records.index', compact('class_sections', 'students', 'classes', 'class_section_id', 'payments'));
    }

    public function create($student_id, Request $request)
    {
        $student = Students::findOrFail($student_id);    
        $class_id = ClassSections::find($student->class_section_id)->class_id;
        $payments = Payments::where('class_id', $class_id)->get();
    
        // Create payment records for the student if they don't already exist
        foreach ($payments as $payment) {
            PaymentRecords::firstOrCreate(
                [
                    'student_id' => $student_id,
                    'payment_id' => $payment->id,
                ],
                [
                    'amount_paid' => 0,
                    'balance' => $payment->amount,
                    'ref_no' => mt_rand(100000, 99999999),
                ]
            );
        }
    
        // Fetch all payment records for the student for display
        $paymentRecords = PaymentRecords::with('payment')
            ->where('student_id', $student_id)
            ->get();
    
        return view('admin.payments.payment-records.create', compact('paymentRecords', 'student', 'student_id'));
    }   

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'year' => 'nullable|integer',
            'amount_paid' => 'required|array',
            'amount_paid.*' => 'required|numeric|min:0',
        ]);
    
        foreach ($request->amount_paid as $recordId => $amountPaid) {
            $paymentRecord = PaymentRecords::findOrFail($recordId);

            // Check if the amount being paid exceeds the remaining balance
            if ($amountPaid > $paymentRecord->balance) {
                return back()->withErrors([
                    "amount_paid.{$recordId}" => "The amount exceeds the remaining balance for payment ID {$recordId}.",
                ]);
            }
    
            // Calculate the new balance
            $newBalance = $paymentRecord->payment->amount - ($paymentRecord->amount_paid + $amountPaid);
    
            // Update the payment record
            $paymentRecord->amount_paid += $amountPaid;
            $paymentRecord->balance = $newBalance;
            $paymentRecord->save();
    
            // Create a receipt record
            Receipts::create([
                'payment_record_id' => $paymentRecord->id,
                'amount_paid' => $amountPaid,
                'balance' => $newBalance,
                // 'date' => now(),
            ]);
        }
    
        return redirect()
            ->route('payment-records.create', ['student_id' => $request->student_id])
            ->with('success', ['message' => 'Payment has been added.']);
    }    

    /**
     * Display the specified resource.
     */
    public function show(PaymentRecords $paymentRecords)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentRecords $paymentRecords)
    {
        //
    }

    // public function update(Request $request)
    // {
    //     // Validate the request to ensure all 'amount_paid' values are numeric
    //     $request->validate([
    //         'student_id' => 'required|exists:students,id',
    //         'year' => 'nullable|integer',
    //         'amount_paid' => 'required|array',  // Ensure 'amount_paid' is an array
    //         'amount_paid.*' => 'required|numeric|min:0',  // Each amount must be numeric and not negative
    //     ]);

    //     // Iterate over each payment record and update the amount_paid
    //     foreach ($request->amount_paid as $recordId => $amountPaid) {
    //         // Find the payment record
    //         $paymentRecord = PaymentRecords::findOrFail($recordId);

    //         // Update the amount paid and balance
    //         $paymentRecord->amount_paid = $amountPaid;
    //         $paymentRecord->balance = $paymentRecord->payment->amount - $amountPaid;

    //         // Save the record
    //         $paymentRecord->save();
    //     }

    //     // Redirect to the manage page with a success message
    //     return redirect()->route('payment-records.manage', ['student_id' => $request->student_id, 'year' => $request->year])
    //         ->with('success', 'Payment amounts updated successfully!');
    // }

    public function destroy(PaymentRecords $paymentRecords)
    {
        //
    }
}
