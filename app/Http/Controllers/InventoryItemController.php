<?php

namespace App\Http\Controllers;

use App\Models\InventoryItem;
use App\Models\InventoryCategory;
use Illuminate\Http\Request;

class InventoryItemController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:180|unique:inventory_items,title',
            'unit' => 'required|string',
            'category_id' => 'required|exists:inventory_categories,id',
        ]);

        InventoryItem::create($validated);

        return redirect()->route('inventory-categories.index')->with('success', ['message' => 'Item has been added.']);
    }

    public function edit(InventoryItem $inventory_item)
    {
        $categories = InventoryCategory::orderBy('title')->get();

        return view('admin.inventory.categories.edit_item', compact('categories', 'inventory_item'));
    }

    public function update(Request $request, InventoryItem $inventory_item)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:180|unique:inventory_items,title,'.$inventory_item->id,
            'unit' => 'required|string',
            'category_id' => 'required|exists:inventory_categories,id',
        ]);

        $inventory_item->update($validated);

        return redirect()->route('inventory-categories.index')->with('success', ['message' => 'Item has been updated.']);
    }

    public function destroy(InventoryItem $inventory_item)
    {
        $inventory_item->delete();

        return redirect()->route('inventory-categories.index')->with('success', ['message' => 'Item has been deleted.']);
    }
}
