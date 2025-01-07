<x-authenticated-layout class="Leaveouts">
    <x-searchable-select-header />

    <div class="custom_form">
        <header>
            <p>Update Leaveout</p>
        </header>

        <form action="{{ route('leaveouts.update', $leaveout->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="row_input_group">
                <div class="input_group">
                    <label for="student_id">Student</label>
                    <select name="student_id" id="student_id" class="searchable_select">
                        <option value="">Select Student</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}"
                                {{ old('student_id', $leaveout->student_id) == $student->id ? 'selected' : '' }}>
                                {{ $student->registration_number . ' - ' . $student->first_name . ' ' . $student->last_name }}
                            </option>
                        @endforeach
                    </select>
                    <span class="inline_alert">{{ $errors->first('student_id') }}</span>
                </div>

                <div class="input_group">
                    <label for="category">Category</label>
                    <select name="category" id="category">
                        <option value="">Select Leave Category</option>
                        @foreach (App\Models\Leaveouts::CATEGORIES as $category)
                            <option value="{{ $category }}"
                                {{ old('category', $leaveout->category) == $category ? 'selected' : '' }}>
                                {{ ucfirst($category) }}</option>
                        @endforeach
                    </select>
                    <span class="inline_alert">{{ $errors->first('category') }}</span>
                </div>
            </div>

            <div class="row_input_group">
                <div class="input_group">
                    <label for="from_date">From Date</label>
                    <input type="date" name="from_date" id="from_date"
                        value="{{ old('from_date', $leaveout->from_date) }}">
                    <span class="inline_alert">{{ $errors->first('from_date') }}</span>
                </div>

                <div class="input_group">
                    <label for="to_date">To Date</label>
                    <input type="date" name="to_date" id="to_date"
                        value="{{ old('to_date', $leaveout->to_date) }}">
                    <span class="inline_alert">{{ $errors->first('to_date') }}</span>
                </div>
            </div>

            <div class="input_group">
                <label for="reason">Reason</label>
                <textarea name="reason" id="editor_ckeditor" cols="30" rows="10" placeholder="Reason for this leave">{{ old('reason', $leaveout->reason) }}</textarea>
                <span class="inline_alert">{{ $errors->first('reason') }}</span>
            </div>

            <div class="buttons">
                <button type="submit">Update</button>

                <button type="button" class="btn_danger" onclick="deleteItem({{ $leaveout->id }}, 'leaveout');"
                    form="deleteForm_{{ $leaveout->id }}">
                    <i class="fas fa-trash-alt delete"></i>
                    <span>Delete</span>
                </button>
            </div>
        </form>

        <form id="deleteForm_{{ $leaveout->id }}" action="{{ route('leaveouts.destroy', $leaveout->id) }}"
            method="post" style="display: none;">
            @csrf
            @method('DELETE')
        </form>

        <x-slot name="javascript">
            <x-searchable-select-js />
            <x-text-editor />
            <x-sweetalert />
        </x-slot>
</x-authenticated-layout>
