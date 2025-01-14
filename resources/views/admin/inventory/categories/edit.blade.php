<x-authenticated-layout class="Inventory">
    <div class="custom_form">
        <header>
            <p>Update Category</p>

            <div class="navigation">
                <a href="{{ route('inventory-categories.index') }}">Categories</a>
                <span>/ Edit</span>
            </div>
        </header>

        <form action="{{ route('inventory-categories.update', $inventory_category->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="input_group">
                <label for="title">Category</label>
                <input type="text" name="title" id="title" value="{{ old('title', $inventory_category->title) }}">
                <span class="inline_alert">{{ $errors->first('title') }}</span>
            </div>

            <div class="buttons">
                <button type="submit">Update</button>

                <button type="button" class="btn_danger" onclick="deleteItem({{ $inventory_category->id }}, 'inventory category');"
                    form="deleteForm_{{ $inventory_category->id }}">
                    <i class="fas fa-trash-alt delete"></i>
                    <span>Delete</span>
                </button>
            </div>
        </form>

        <form id="deleteForm_{{ $inventory_category->id }}" action="{{ route('inventory-categories.destroy', $inventory_category->id) }}" method="post"
            style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>

    <x-slot name="javascript">
        <x-sweetalert />
    </x-slot>
</x-authenticated-layout>
