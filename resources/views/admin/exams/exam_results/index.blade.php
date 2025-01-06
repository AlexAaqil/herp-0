<x-authenticated-layout class="Exams">
    <x-searchable-select-header />

    <x-admin-header header_title="Exams Results" :total_count="count($results)" />

    <div class="row_container">
        <div class="body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Class</th>
                        <th>Exam</th>
                        <th>Subject</th>
                        <th>Marks</th>
                        <th>Grade</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($results) > 0)
                        @foreach ($results as $result)
                            <tr class="searchable">
                                <td>
                                    <a href="{{ route('exam-results.edit', $result->id) }}">{{ $result->student->registration_number . ' - ' . $result->student->first_name . ' ' . $result->student->last_name }}</a>
                                </td>
                                <td>{{ $result->student->studentClassSection->title }}</td>
                                <td>{{ $result->exam->year . ' Term - ' . $result->exam->term }}</td>
                                <td>{{ $result->subject->title }}</td>
                                <td>{{ $result->marks }}</td>
                                <td>{{ $result->grade }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No exam results have been added yet</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="custom_form">
            <header>
                <p>New Exam Result</p>
            </header>

            <form action="{{ route('exam-results.store') }}" method="post">
                @csrf

                <div class="input_group">
                    <label for="student_id">Student</label>
                    <select name="student_id" id="student_id" class="searchable_select">
                        <option value="">Select Student</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}"
                                {{ old('student_id') == $student->id ? 'selected' : '' }}>
                                {{ $student->registration_number . ' - ' . $student->first_name . ' ' . $student->last_name }}
                            </option>
                        @endforeach
                    </select>
                    <span class="inline_alert">{{ $errors->first('student_id') }}</span>
                </div>

                <div class="input_group">
                    <label for="exam_id">Exam</label>
                    <select name="exam_id" id="exam_id">
                        <option value="">Select Exam</option>
                        @foreach ($exams as $exam)
                            <option value="{{ $exam->id }}" {{ old('exam_id') == $exam->id ? 'selected' : '' }}>
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
                                {{ old('subject_id') == $subject->id ? 'selected' : '' }}>{{ $subject->title }}
                            </option>
                        @endforeach
                    </select>
                    <span class="inline_alert">{{ $errors->first('subject_id') }}</span>
                </div>

                <div class="input_group">
                    <label for="marks">Marks</label>
                    <input type="number" name="marks" id="marks" value="{{ old('marks') }}">
                    <span class="inline_alert">{{ $errors->first('marks') }}</span>
                </div>

                <button type="submit">Save</button>
            </form>
        </div>
    </div>

    <x-slot name="javascript">
        <x-searchable-select-js />
    </x-slot>
</x-authenticated-layout>
