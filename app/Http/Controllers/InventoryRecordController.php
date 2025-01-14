<?php

namespace App\Http\Controllers;

use App\Models\InventoryItem;
use App\Models\InventoryRecord;
use Illuminate\Http\Request;

class InventoryRecordController extends Controller
{
    public function index()
    {
        $inventories = InventoryRecord::orderBy('date')->get();

        return view('admin.inventory.records.index', compact('inventories'));
    }

    public function create()
    {
        $items = InventoryItem::orderBy('title')->get();

        return view('admin.inventory.records.create', compact('items'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_id' => 'required|exists:inventory_items,id',
            'transaction' => 'required|in:0,1',
            'quantity' => 'required|numeric',
            'remaining' => 'nullable|numeric',
            'date' => 'required|date',
            'description' => 'nullable|string|max:255',
        ]);

        InventoryRecord::create($validated);

        return redirect()->route('inventory-records.index')->with('success', ['message' => 'Inventory has been added.']);
    }

    public function edit(InventoryRecord $inventory_record)
    {
        $items = InventoryItem::orderBy('title')->get();

        return view('admin.inventory.records.edit', compact('items', 'inventory_record'));
    }

    public function update(Request $request, InventoryRecord $inventory_record)
    {
        $validated = $request->validate([
            'item_id' => 'required|exists:inventory_items,id',
            'transaction' => 'required|in:0,1',
            'quantity' => 'required|numeric',
            'remaining' => 'nullable|numeric',
            'date' => 'required|date',
            'description' => 'nullable|string|max:255',
        ]);

        $inventory_record->update($validated);

        return redirect()->route('inventory-records.index')->with('success', ['message' => 'Inventory has been updated.']);
    }

    public function destroy(InventoryRecord $inventory_record)
    {
        $inventory_record->delete();

        return redirect()->route('inventory-records.index')->with('success', ['message' => 'Inventory has been deleted.']);
    }
}
