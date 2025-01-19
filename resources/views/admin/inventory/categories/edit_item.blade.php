<x-authenticated-layout class="Inventory">
    <div class="custom_form">
        <header>
            <p>Update Item</p>

            <div class="navigation">
                <a href="{{ route('inventory-categories.index') }}">Categories</a>
                <span>/ Edit</span>
            </div>
        </header>

        <form action="{{ route('inventory-items.update', $inventory_item->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="input_group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $inventory_item->category_id) == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="input_group">
                <label for="title">Item Name</label>
                <input type="text" name="title" id="title" value="{{ old('title', $inventory_item->title) }}">
                <span class="inline_alert">{{ $errors->first('title') }}</span>
            </div>

            <div class="input_group">
                <label for="unit">Unit of measurement (Kgs, ltrs, pcs)</label>
                <input type="text" name="unit" id="unit" value="{{ old('unit', $inventory_item->unit) }}">
                <span class="inline_alert">{{ $errors->first('unit') }}</span>
            </div>

            <div class="buttons">
                <button type="submit">Update</button>

                <button type="button" class="btn_danger" onclick="deleteItem({{ $inventory_item->id }}, 'inventory item');"
                    form="deleteForm_{{ $inventory_item->id }}">
                    <i class="fas fa-trash-alt delete"></i>
                    <span>Delete</span>
                </button>
            </div>
        </form>

        <form id="deleteForm_{{ $inventory_item->id }}" action="{{ route('inventory-items.destroy', $inventory_item->id) }}" method="post"
            style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>

    <x-slot name="javascript">
        <x-sweetalert />
    </x-slot>
</x-authenticated-layout>
