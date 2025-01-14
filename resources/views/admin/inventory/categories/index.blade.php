<x-authenticated-layout class="Inventory">
    <x-admin-header header_title="Inventory Categories" :total_count="count($categories)" />

    <div class="row_container">
        <div class="body">
            <ol class="nested_list">
                @forelse ($categories as $category)
                    <li class="searchable">
                        <a href="{{ route('inventory-categories.edit', $category->id) }}">{{ $category->title }}</a>
                        <ul>
                            @forelse ($category->items as $item)
                                <li>
                                    <a href="{{ route('inventory-items.edit', $item->id) }}">{{ $item->title.' ('.$item->unit.')' }}</a>
                                </li>
                            @empty
                                <span>No available items</span>
                            @endforelse
                        </ul>
                    </li>
                @empty
                    <li>No Categories have been added yet.</li>
                @endforelse
            </ol>
        </div>

        <div class="forms">
            <div class="custom_form">
                <header>
                    <p>New Category</p>
                </header>
    
                <form action="{{ route('inventory-categories.store') }}" method="post">
                    @csrf
    
                    <div class="input_group">
                        <label for="title">Category</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}">
                        <span class="inline_alert">{{ $errors->first('title') }}</span>
                    </div>
    
                    <button type="submit">Save</button>
                </form>
            </div>
    
            <div class="custom_form">
                <header>
                    <p>New Item</p>
                </header>
    
                <form action="{{ route('inventory-items.store') }}" method="post">
                    @csrf
    
                    <div class="input_group">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
    
                    <div class="input_group">
                        <label for="title">Item</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}">
                        <span class="inline_alert">{{ $errors->first('title') }}</span>
                    </div>
    
                    <div class="input_group">
                        <label for="unit">Unit</label>
                        <input type="text" name="unit" id="unit" value="{{ old('unit') }}">
                        <span class="inline_alert">{{ $errors->first('unit') }}</span>
                    </div>
    
                    <button type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>

</x-authenticated-layout>
