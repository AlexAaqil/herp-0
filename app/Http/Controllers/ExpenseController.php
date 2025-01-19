<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::orderBy('date')->get();

        return view('admin.expenses.index', compact('expenses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'recepient' => 'required|string|max:255',
            'category' => ['required', Rule::in(Expense::EXPENSECATEGORIES)],
            'amount_paid' => 'required|numeric|min:0',
            'date' => 'required|date',
            'description' => 'nullable|string|max:255',
        ]);

        Expense::create($validated);

        return redirect()->route('expenses.index')->with('success', ['message' => 'Expense has been added.']);
    }

    public function edit(Expense $expense)
    {
        return view('admin.expenses.edit', compact('expense'));
    }

    public function update(Request $request, Expense $expense)
    {
        $validated = $request->validate([
            'recepient' => 'required|string|max:255',
            'category' => ['required', Rule::in(Expense::EXPENSECATEGORIES)],
            'amount_paid' => 'required|numeric|min:0',
            'date' => 'required|date',
            'description' => 'nullable|string|max:255',
        ]);

        $expense->update($validated);

        return redirect()->route('expenses.index')->with('success', ['message' => 'Expense has been updated.']);
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();

        return redirect()->route('expenses.index')->with('success', ['message' => 'Expense has been deleted.']);
    }

    public function print_receipt(Expense $expense)
    {
        return view('admin.expenses.receipt', compact('expense'));
    }
}
