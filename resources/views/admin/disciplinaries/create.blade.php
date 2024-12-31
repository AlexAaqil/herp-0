<x-authenticated-layout class="Users">
    <x-searchable-select-header />

    <div class="custom_form">
        <header>
            <p>New Disciplinary</p>
        </header>

        <form action="{{ route('disciplinaries.store') }}" method="post">
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
                    <div class="custom_radio_buttons">
                        <label>
                            <input class="option_radio" type="radio" name="category" id="minor"
                                value="minor" {{ old('category', 'minor') == 'minor' ? 'checked' : '' }}>
                            <span>Minor</span>
                        </label>

                        <label>
                            <input class="option_radio" type="radio" name="category" id="major"
                                value="major" {{ old('category') == 'major' ? 'checked' : '' }}>
                            <span>Major</span>
                        </label>
                    </div>
                    <span class="inline_alert">{{ $errors->first('category') }}</span>
                </div>
            </div>

            <div class="input_group">
                <label for="comment">Comment</label>
                <textarea name="comment" id="editor_ckeditor" cols="30" rows="10" placeholder="Enter your comment">{{ old('comment') }}</textarea>
                <span class="inline_alert">{{ $errors->first('comment') }}</span>
            </div>

            <button type="submit">Save</button>
        </form>
    </div>

    <x-slot name="javascript">
        <x-searchable-select-js />
        <x-text-editor />
    </x-slot>
</x-authenticated-layout>
