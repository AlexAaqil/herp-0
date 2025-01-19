<x-authenticated-layout class="Classes">
    <div class="custom_form">
        <div class="system_nav">
            <a href="{{ route('settings.index') }}">Settings</a>
            <a href="{{ route('grades.index') }}">Grades</a>
            <span>Edit</span>
        </div>

        <header>
            <p>Update Grading</p>
        </header>

        <form action="{{ route('grades.update', $grade->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="input_group">
                <label for="grade">Grade</label>
                <input type="text" name="grade" id="grade" placeholder="A, B, C, D..."
                    value="{{ old('grade', $grade->grade) }}">
                <span class="inline_alert">{{ $errors->first('grade') }}</span>
            </div>

            <div class="input_group">
                <label for="min_marks">Minimum Marks</label>
                <input type="number" name="min_marks" id="min_marks" value="{{ old('min_marks', $grade->min_marks) }}">
                <span class="inline_alert">{{ $errors->first('min_marks') }}</span>
            </div>

            <div class="input_group">
                <label for="max_marks">Maximum Marks</label>
                <input type="number" name="max_marks" id="max_marks" value="{{ old('max_marks', $grade->max_marks) }}">
                <span class="inline_alert">{{ $errors->first('max_marks') }}</span>
            </div>

            <div class="input_group">
                <label for="remarks">Remarks</label>
                <input type="text" name="remarks" id="remarks" value="{{ old('remarks', $grade->remarks) }}">
                <span class="inline_alert">{{ $errors->first('remarks') }}</span>
            </div>

            <div class="buttons">
                <button type="submit">Update</button>

                <button type="button" class="btn_danger" onclick="deleteItem({{ $grade->id }}, 'grade');"
                    form="deleteForm_{{ $grade->id }}">
                    <i class="fas fa-trash-alt delete"></i>
                    <span>Delete</span>
                </button>
            </div>
        </form>

        <form id="deleteForm_{{ $grade->id }}" action="{{ route('grades.destroy', $grade->id) }}" method="post"
            style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>

    <x-slot name="javascript">
        <x-sweetalert />
    </x-slot>
</x-authenticated-layout>
