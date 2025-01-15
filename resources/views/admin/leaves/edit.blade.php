<x-authenticated-layout class="Leaves">
    <div class="custom_form">
        <header>
            <p>Update Leave Application</p>
        </header>

        <form action="{{ route('leaves.update', $leave->id) }}" method="post">
            @csrf
            @method('PATCH')

            @php
                $is_not_pending = $leave->status != 'pending';
            @endphp

            <div class="row_input_group_3">
                <div class="input_group">
                    <label for="category">Category</label>
                    <select name="category" id="category" {{ $is_not_pending ? 'disabled' : '' }}>
                        <option value="">Select Leave Category</option>
                        @foreach(App\Models\Leave::CATEGORIES as $category)
                            <option value="{{ $category }}" {{old('category', $leave->category) == $category ? 'selected' : ''}}>{{ ucfirst($category) }}</option>
                        @endforeach
                    </select>
                    <span class="inline_alert">{{ $errors->first('category') }}</span>
                </div>

                <div class="input_group">
                    <label for="from_date">From Date</label>
                    <input type="date" name="from_date" id="from_date" value="{{ old('from_date', $leave->from_date->format('Y-m-d')) }}" {{ $is_not_pending ? 'disabled' : '' }} min="{{ now()->format('Y-m-d') }}" max="{{ now()->addMonths(2)->format('Y-m-d') }}">
                    <span class="inline_alert">{{ $errors->first('from_date') }}</span>
                </div>
    
                <div class="input_group">
                    <label for="to_date">To Date</label>
                    <input type="date" name="to_date" id="to_date" value="{{ old('to_date', $leave->to_date->format('Y-m-d')) }}" {{ $is_not_pending ? 'disabled' : '' }} min="{{ now()->format('Y-m-d') }}" max="{{ now()->addMonths(2)->format('Y-m-d') }}">
                    <span class="inline_alert">{{ $errors->first('to_date') }}</span>
                </div>
            </div>

            @can('view-as-admin')
            <div class="input_group">
                <label for="status">Approval</label>
                <div class="custom_radio_buttons">
                    <label>
                        <input class="option_radio" type="radio" name="status" id="approved" value="approved"
                            {{ old('status', $leave->status) == 'approved' ? 'checked' : '' }}>
                        <span>Approved</span>
                    </label>

                    <label>
                        <input class="option_radio" type="radio" name="status" id="rejected" value="rejected"
                            {{ old('status', $leave->status) == 'rejected' ? 'checked' : '' }}>
                        <span>Rejected</span>
                    </label>
                </div>
                <span class="inline_alert">{{ $errors->first('status') }}</span>
            </div>
            @endcan

            <div class="input_group">
                <label for="reason">Reason</label>
                <textarea name="reason" id="editor_ckeditor" cols="30" rows="10" placeholder="Reason for this leave">{{ old('reason', $leave->reason) }}</textarea>
                <span class="inline_alert">{{ $errors->first('reason') }}</span>
            </div>

            @if($leave->status == 'pending' || auth()->user()->user_level == 0 || auth()->user()->user_level == 1)
            <div class="buttons">
                <button type="submit">Update</button>

                <button type="button" class="btn_danger" onclick="deleteItem({{ $leave->id }}, 'leave');"
                    form="deleteForm_{{ $leave->id }}">
                    <i class="fas fa-trash-alt delete"></i>
                    <span>Delete</span>
                </button>
            </div>
        </form>

        <form id="deleteForm_{{ $leave->id }}" action="{{ route('leaves.destroy', $leave->id) }}"
            method="post" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
        @else
            <p>Already {{ ucfirst($leave->status) }}</p>
        @endif
    </div>

    <x-slot name="javascript">
        <x-text-editor />
        <x-sweetalert />
    </x-slot>
</x-authenticated-layout>
