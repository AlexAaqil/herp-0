<x-authenticated-layout class="Users">
    <x-searchable-select-header />

    <div class="custom_form">
        <header>
            <p>Update Disciplinary</p>
        </header>

        <form action="{{ route('disciplinaries.update', $disciplinary->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="row_input_group">
                <div class="input_group">
                    <label for="student_id">Student</label>
                    <select name="student_id" id="student_id" class="searchable_select">
                        <option value="">Select Student</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}"
                                {{ old('student_id', $disciplinary->student_id) == $student->id ? 'selected' : '' }}>
                                {{ $student->registration_number . ' - ' . $student->first_name . ' ' . $student->last_name }}
                            </option>
                        @endforeach
                    </select>
                    <span class="inline_alert">{{ $errors->first('student_id') }}</span>
                </div>

                <div class="input_group">
                    <label for="category">Category</label>
                    <div class="custom_radio_buttons">
                        <label>
                            <input class="option_radio" type="radio" name="category" id="minor" value="minor"
                                {{ old('category', $disciplinary->category) == 'minor' ? 'checked' : '' }}>
                            <span>Minor</span>
                        </label>

                        <label>
                            <input class="option_radio" type="radio" name="category" id="major" value="major"
                                {{ old('category', $disciplinary->category) == 'major' ? 'checked' : '' }}>
                            <span>Major</span>
                        </label>
                    </div>
                    <span class="inline_alert">{{ $errors->first('category') }}</span>
                </div>
            </div>

            <div class="input_group">
                <label for="comment">Comment</label>
                <textarea name="comment" id="editor_ckeditor" cols="30" rows="10" placeholder="Enter your comment">{{ old('comment', $disciplinary->comment) }}</textarea>
                <span class="inline_alert">{{ $errors->first('comment') }}</span>
            </div>

            <div class="buttons">
                <button type="submit">Update</button>

                <button type="button" class="delete_btn" onclick="deleteItem({{ $disciplinary->id }}, 'disciplinary');"
                    form="deleteForm_{{ $disciplinary->id }}">
                    <i class="fas fa-trash-alt delete"></i>
                    <span>Delete</span>
                </button>
            </div>
        </form>

        <form id="deleteForm_{{ $disciplinary->id }}" action="{{ route('disciplinaries.destroy', $disciplinary->id) }}" method="post"
            style="display: none;">
            @csrf
            @method('DELETE')
        </form>

    <x-slot name="javascript">
        <x-searchable-select-js />
        <x-text-editor />
        <x-sweetalert />
    </x-slot>
</x-authenticated-layout>
