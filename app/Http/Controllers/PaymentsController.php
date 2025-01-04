<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PaymentsController extends Controller
{
    public function index()
    {
        $payments = Payments::orderBy('year')->get();
        $classes = Classes::orderBy('class_name')->get();
        return view('admin.payments.payments.index', compact('payments', 'classes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'payment_method' => 'required|string',
            'amount' => 'required|numeric',
            'class_id' => 'required|exists:classes,id',
            'year' => 'required|string',
            'term' => 'required|numeric|in:1,2,3',
        ]);

        $yearPrefix = substr($validated['year'], -2);
        $referenceNumber = $yearPrefix . '0' . $validated['term'] . strtoupper(Str::random(4));
        $validated['reference_number'] = $referenceNumber;

        Payments::create($validated);

        return redirect()->route('payments.index')->with('success', ['message' => 'Payment has been added successfully.']);
    }

    public function edit(Payments $payment)
    {
        return view('admin.payments.payments.edit', compact('payment'));
    }

    public function update(Request $request, Payments $payment)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'amount' => 'required|numeric',
        ]);

        $payment->update($validated);

        return redirect()->route('payments.index')->with('success', ['message' => 'Payment has been updated.']);
    }

    public function destroy(Payments $payment)
    {
        $payment->delete();

        return redirect()->route('payments.index')->with('success', ['message' => 'Payment has been deleted.']);
    }
}
