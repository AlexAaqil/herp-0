<x-authenticated-layout class="Exams">
    <div class="custom_form">
        <header>
            <p>Update Exam</p>

            <div class="navigation">
                <a href="{{ route('settings.index') }}">Settings</a>
                <a href="{{ route('exams.index') }}">/ Exams</a>
                <span>/ Edit</span>
            </div>
        </header>

        <form action="{{ route('exams.update', $exam->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="input_group">
                <label for="title">Exam</label>
                <input type="text" name="title" id="title" value="{{ old('title', $exam->title) }}">
                <span class="inline_alert">{{ $errors->first('title') }}</span>
            </div>

            <div class="input_group">
                <label for="year">Year</label>
                <input type="number" name="year" id="year" value="{{ old('year', $exam->year) }}">
                <span class="inline_alert">{{ $errors->first('year') }}</span>
            </div>

            <div class="input_group">
                <label for="term">Term</label>
                <select name="term" id="term">
                    <option value="">Select Term</option>
                    <option value="1" {{ old('term', $exam->term) == '1' ? 'selected' : '' }}>Term 1</option>
                    <option value="2" {{ old('term', $exam->term) == '2' ? 'selected' : '' }}>Term 2</option>
                    <option value="3" {{ old('term', $exam->term) == '3' ? 'selected' : '' }}>Term 3</option>
                </select>
                <span class="inline_alert">{{ $errors->first('term') }}</span>
            </div>

            <div class="buttons">
                <button type="submit">Update</button>

                <button type="button" class="btn_danger" onclick="deleteItem({{ $exam->id }}, 'exam');"
                    form="deleteForm_{{ $exam->id }}">
                    <i class="fas fa-trash-alt delete"></i>
                    <span>Delete</span>
                </button>
            </div>
        </form>

        <form id="deleteForm_{{ $exam->id }}" action="{{ route('exams.destroy', $exam->id) }}" method="post"
            style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>

    <x-slot name="javascript">
        <x-sweetalert />
    </x-slot>
</x-authenticated-layout>
