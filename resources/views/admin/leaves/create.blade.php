<x-authenticated-layout class="Leaves">
    <div class="custom_form">
        <header>
            <p>Apply for Leave</p>
        </header>

        <form action="{{ route('leaves.store') }}" method="post">
            @csrf

            <div class="row_input_group_3">
                <div class="input_group">
                    <label for="category">Category</label>
                    <select name="category" id="category">
                        <option value="">Select Leave Category</option>
                        @foreach (App\Models\Leave::CATEGORIES as $category)
                            <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>
                                {{ ucfirst($category) }}</option>
                        @endforeach
                    </select>
                    <span class="inline_alert">{{ $errors->first('category') }}</span>
                </div>

                <div class="input_group">
                    <label for="from_date">From Date</label>
                    <input type="date" name="from_date" id="from_date" value="{{ old('from_date') }}"
                        min="{{ now()->format('Y-m-d') }}" max="{{ now()->addMonths(2)->format('Y-m-d') }}">
                    <span class="inline_alert">{{ $errors->first('from_date') }}</span>
                </div>

                <div class="input_group">
                    <label for="to_date">To Date</label>
                    <input type="date" name="to_date" id="to_date" value="{{ old('to_date') }}" min="{{ now()->format('Y-m-d') }}" max="{{ now()->addMonths(2)->format('Y-m-d') }}">
                    <span class="inline_alert">{{ $errors->first('to_date') }}</span>
                </div>
            </div>

            <div class="input_group">
                <label for="reason">Reason</label>
                <textarea name="reason" id="editor_ckeditor" cols="30" rows="10" placeholder="Reason for this leave">{{ old('reason') }}</textarea>
                <span class="inline_alert">{{ $errors->first('reason') }}</span>
            </div>

            <button type="submit">Save</button>
        </form>
    </div>

    <x-slot name="javascript">
        <x-text-editor />
    </x-slot>
</x-authenticated-layout>
