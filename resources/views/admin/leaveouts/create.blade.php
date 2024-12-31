<x-authenticated-layout class="Leaveouts">
    <x-searchable-select-header />

    <div class="custom_form">
        <header>
            <p>New Leaveout</p>
        </header>

        <form action="{{ route('leaveouts.store') }}" method="post">
            @csrf

            <div class="row_input_group">
                <div class="input_group">
                    <label for="student_id">Student</label>
                    <select name="student_id" id="student_id" class="searchable_select">
                        <option value="">Select Student</option>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>{{ $student->registration_number.' - '.$student->first_name.' '.$student->last_name }}</option>
                        @endforeach
                    </select>
                    <span class="inline_alert">{{ $errors->first('student_id') }}</span>
                </div>

                <div class="input_group">
                    <label for="category">Category</label>
                    <select name="category" id="category">
                        <option value="">Select Leave Category</option>
                        @foreach(App\Models\Leaveouts::CATEGORIES as $category)
                            <option value="{{ $category }}" {{old('category') == $category ? 'selected' : ''}}>{{ ucfirst($category) }}</option>
                        @endforeach
                    </select>
                    <span class="inline_alert">{{ $errors->first('category') }}</span>
                </div>
            </div>

            <div class="row_input_group">
                <div class="input_group">
                    <label for="from_date">From Date</label>
                    <input type="date" name="from_date" id="from_date" value="{{ old('from_date') }}">
                    <span class="inline_alert">{{ $errors->first('from_date') }}</span>
                </div>

                <div class="input_group">
                    <label for="to_date">To Date</label>
                    <input type="date" name="to_date" id="to_date" value="{{ old('to_date') }}">
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
        <x-searchable-select-js />
        <x-text-editor />
    </x-slot>
</x-authenticated-layout>
