<x-authenticated-layout class="Exams">
    <x-searchable-select-header />

    <div class="custom_form">
        <header>
            <p>Update Exam Result</p>

            <div class="navigation">
                <a href="{{ route('exam-results.index') }}">Exam Results</a>
                <span>/ Edit</span>
            </div>
        </header>

        <form action="{{ route('exam-results.update', $exam_result->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="details">
                <p>
                    <span>Student:</span>
                    <span>{{ $exam_result->student->registration_number . ' - ' . $exam_result->student->first_name . ' ' . $exam_result->student->last_name }}</span>
                </p>
            </div>

            <div class="input_group">
                <label for="exam_id">Exam</label>
                <select name="exam_id" id="exam_id">
                    <option value="">Select Exam</option>
                    @foreach ($exams as $exam)
                        <option value="{{ $exam->id }}"
                            {{ old('exam_id', $exam_result->exam_id) == $exam->id ? 'selected' : '' }}>
                            {{ $exam->title . ' - ' . $exam->year . ' Term - ' . $exam->term }}</option>
                    @endforeach
                </select>
                <span class="inline_alert">{{ $errors->first('exam_id') }}</span>
            </div>

            <div class="input_group">
                <label for="subject_id">Subject</label>
                <select name="subject_id" id="subject_id">
                    <option value="">Select Subject</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}"
                            {{ old('subject_id', $exam_result->subject_id) == $subject->id ? 'selected' : '' }}>
                            {{ $subject->title }}
                        </option>
                    @endforeach
                </select>
                <span class="inline_alert">{{ $errors->first('subject_id') }}</span>
            </div>

            <div class="input_group">
                <label for="marks">Marks</label>
                <input type="number" name="marks" id="marks" value="{{ old('marks', $exam_result->marks) }}">
                <span class="inline_alert">{{ $errors->first('marks') }}</span>
            </div>

            <div class="buttons">
                <button type="submit">Update</button>

                <button type="button" class="btn_danger" onclick="deleteItem({{ $exam_result->id }}, 'exam result');"
                    form="deleteForm_{{ $exam_result->id }}">
                    <i class="fas fa-trash-alt delete"></i>
                    <span>Delete</span>
                </button>
            </div>
        </form>

        <form id="deleteForm_{{ $exam_result->id }}" action="{{ route('exam-results.destroy', $exam_result->id) }}"
            method="post" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>

    <x-slot name="javascript">
        <x-searchable-select-js />
        <x-sweetalert />
    </x-slot>
</x-authenticated-layout>
