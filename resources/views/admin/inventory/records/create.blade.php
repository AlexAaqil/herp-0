<x-authenticated-layout class="Inventory">
    <x-searchable-select-header />

    <div class="custom_form">
        <header>
            <p>New Inventory</p>

            <div class="system_nav">
                <a href="{{ route('inventory-records.index') }}">Inventory</a>
                <span>/ New</span>
            </div>
        </header>

        <form action="{{ route('inventory-records.store') }}" method="post">
            @csrf

            <div class="row_input_group">
                <div class="input_group">
                    <label for="item_id" class="required">Item</label>
                    <select name="item_id" id="item_id" class="searchable_select">
                        <option value="">Item</option>
                        @foreach ($items as $item)
                            <option value="{{ $item->id }}" {{ old('item_id') == $item->id ? 'selected' : '' }}>
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
                                {{ old('transaction', 1) == 1 ? 'checked' : '' }}>
                            <span>Arrival</span>
                        </label>

                        <label>
                            <input class="option_radio" type="radio" name="transaction" id="usage" value="0"
                                {{ old('transaction', 1) == 0 ? 'checked' : '' }}>
                            <span>Usage</span>
                        </label>
                    </div>
                    <span class="inline_alert">{{ $errors->first('transaction') }}</span>
                </div>
            </div>

            <div class="row_input_group_3">
                <div class="input_group">
                    <label for="quantity" class="required">Quantity</label>
                    <input type="number" name="quantity" id="quantity" value="{{ old('quantity') }}">
                    <span class="inline_alert">{{ $errors->first('quantity') }}</span>
                </div>

                <div class="input_group">
                    <label for="remaining">Remaining Amount</label>
                    <input type="number" name="remaining" id="remaining" value="{{ old('remaining') }}">
                    <span class="inline_alert">{{ $errors->first('remaining') }}</span>
                </div>

                <div class="input_group">
                    <label for="date" class="required">Date</label>
                    <input type="date" name="date" id="date" value="{{ old('date') }}">
                    <span class="inline_alert">{{ $errors->first('date') }}</span>
                </div>
            </div>

            <div class="input_group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" value="{{ old('description') }}">
                <span class="inline_alert">{{ $errors->first('description') }}</span>
            </div>

            <button type="submit">Save</button>
        </form>
    </div>

    <x-slot name="javascript">
        <x-searchable-select-js />
    </x-slot>
</x-authenticated-layout>
