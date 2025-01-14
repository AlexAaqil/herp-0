<?php

namespace App\Http\Controllers;

use App\Models\InventoryCategory;
use Illuminate\Http\Request;

class InventoryCategoryController extends Controller
{
    public function index()
    {
        $categories = InventoryCategory::orderBy('title')->with('items')->get();

        return view('admin.inventory.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:180|unique:inventory_categories,title',
        ]);

        InventoryCategory::create($validated);

        return redirect()->route('inventory-categories.index')->with('success', ['message' => 'Category has been added.']);
    }

    public function edit(InventoryCategory $inventory_category)
    {
        return view('admin.inventory.categories.edit', compact('inventory_category'));
    }

    public function update(Request $request, InventoryCategory $inventory_category)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:180|unique:inventory_categories,title,'.$inventory_category->id,
        ]);

        $inventory_category->update($validated);

        return redirect()->route('inventory-categories.index')->with('success', ['message' => 'Category has been updated.']);
    }

    public function destroy(InventoryCategory $inventory_category)
    {
        $inventory_category->delete();

        return redirect()->route('inventory-categories.index')->with('success', ['message' => 'Category has been deleted.']);
    }
}
