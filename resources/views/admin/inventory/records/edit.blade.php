<x-authenticated-layout class="Inventory">
    <x-searchable-select-header />

    <div class="custom_form">
        <header>
            <p>Update Inventory</p>

            <div class="navigation">
                <a href="{{ route('inventory-records.index') }}">Inventory</a>
                <span>/ Edit</span>
            </div>
        </header>

        <form action="{{ route('inventory-records.update', $inventory_record->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="row_input_group">
                <div class="input_group">
                    <label for="item_id" class="required">Item</label>
                    <select name="item_id" id="item_id" class="searchable_select">
                        <option value="">Item</option>
                        @foreach ($items as $item)
                            <option value="{{ $item->id }}" {{ old('item_id', $inventory_record->item_id) == $item->id ? 'selected' : '' }}>
                                {{ $item->title . ' (' . $item->unit. ')' }}
                            </option>
                        @endforeach
                    </select>
                    <span class="inline_alert">{{ $errors->first('item_id') }}</span>
                </div>

                <div class="input_group">
                    <label for="transaction" class="required">Transaction Type</label>
                    <div class="custom_radio_buttons">
                        <label>
                            <input class="option_radio" type="radio" name="transaction" id="arrival" value="1"
                                {{ old('transaction', $inventory_record->transaction) == 1 ? 'checked' : '' }}>
                            <span>Arrival</span>
                        </label>

                        <label>
                            <input class="option_radio" type="radio" name="transaction" id="usage" value="0"
                                {{ old('transaction', $inventory_record->transaction) == 0 ? 'checked' : '' }}>
                            <span>Usage</span>
                        </label>
                    </div>
                    <span class="inline_alert">{{ $errors->first('transaction') }}</span>
                </div>
            </div>

            <div class="row_input_group_3">
                <div class="input_group">
                    <label for="quantity" class="required">Quantity</label>
                    <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $inventory_record->quantity) }}">
                    <span class="inline_alert">{{ $errors->first('quantity') }}</span>
                </div>

                <div class="input_group">
                    <label for="remaining">Remaining Amount</label>
                    <input type="number" name="remaining" id="remaining" value="{{ old('remaining', $inventory_record->remaining) }}">
                    <span class="inline_alert">{{ $errors->first('remaining') }}</span>
                </div>

                <div class="input_group">
                    <label for="date" class="required">Date</label>
                    <input type="date" name="date" id="date" value="{{ old('date', $inventory_record->date->format('Y-m-d')) }}">
                    <span class="inline_alert">{{ $errors->first('date') }}</span>
                </div>
            </div>

            <div class="input_group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" value="{{ old('description', $inventory_record->description) }}">
                <span class="inline_alert">{{ $errors->first('description') }}</span>
            </div>

            @can('view-as-storekeeper')
            <div class="buttons">
                <button type="submit">Update</button>

                <button type="button" class="btn_danger" onclick="deleteItem({{ $inventory_record->id }}, 'inventory record');"
                    form="deleteForm_{{ $inventory_record->id }}">
                    <i class="fas fa-trash-alt delete"></i>
                    <span>Delete</span>
                </button>
            </div>
        </form>

        <form id="deleteForm_{{ $inventory_record->id }}" action="{{ route('inventory-records.destroy', $inventory_record->id) }}" method="post"
            style="display: none;">
            @csrf
            @method('DELETE')
        </form>
        @endcan
    </div>

    <x-slot name="javascript">
        <x-searchable-select-js />
        <x-sweetalert />
    </x-slot>
</x-authenticated-layout>
