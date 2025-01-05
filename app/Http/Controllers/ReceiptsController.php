<?php

namespace App\Http\Controllers;

use App\Models\Receipts;
use App\Models\PaymentRecords;
use Illuminate\Http\Request;

class ReceiptsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Receipts $receipts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Receipts $receipts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Receipts $receipts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Receipts $receipts)
    {
        //
    }

    public function print($payment_record_id)
    {
        // Fetch the payment record along with its related receipts, payment, and student
        $paymentRecord = PaymentRecords::with([
            'receipts',
            'student',
            'payment'
        ])
        ->findOrFail($payment_record_id);

        // Extract the necessary related data
        $student = $paymentRecord->student;
        $payment = $paymentRecord->payment;
        $receipts = $paymentRecord->receipts;

        // Pass the data to the view for rendering
        return view('admin.payments.receipts.print', [
            'paymentRecord' => $paymentRecord,
            'student' => $student,
            'payment' => $payment,
            'receipts' => $receipts
        ]);
    }
}
