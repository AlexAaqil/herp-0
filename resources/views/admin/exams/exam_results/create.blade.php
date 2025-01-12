<x-authenticated-layout class="Exams">
    <x-searchable-select-header />

    <div class="system_nav">
        <a href="{{ route('exam-results.index') }}">Exam Results</a>
        <span>/ New</span>
    </div>

    <div class="custom_form">
        <header>
            <p>New Exam Result</p>
        </header>

        <form action="{{ route('exam-results.store') }}" method="POST">
            @csrf

            <label for="exam_id" class="required">Select Exam</label>
            <select name="exam_id" id="exam_id" class="searchable_select">
                <option value="">Select Exam</option>
                @foreach ($exams as $exam)
                    <option value="{{ $exam->id }}"
                        {{ old('exam_id') == $exam->id ? 'selected' : '' }}>
                        {{ $exam->title }} - {{ $exam->year }} Term {{ $exam->term }}
                    </option>
                @endforeach
            </select>
            <span class="inline_alert">{{ $errors->first('exam_id') }}</span>

            <table>
                <thead>
                    <tr>
                        <th>Student</th>
                        @foreach ($subjects as $subject)
                            <th>{{ $subject->title }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->first_name . ' ' . $student->last_name }}</td>
                            @foreach ($subjects as $subject)
                                <td>
                                    <input type="number" name="marks[{{ $student->id }}][{{ $subject->id }}]" 
                                           min="0" max="100" value="{{ old('marks.' . $student->id . '.' . $subject->id) }}">
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="submit">Save</button>
        </form>
    </div>

    <div class="row_container">
        <!-- You can add the results display section here if needed -->
    </div>

    <x-slot name="javascript">
        <x-searchable-select-js />
    </x-slot>
</x-authenticated-layout>
