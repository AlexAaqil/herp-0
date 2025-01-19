<x-authenticated-layout class="Exams">
    <x-admin-header header_title="Exams Results" route="{{ route('exam-results.create') }}" />

    <div class="custom_form">
        <!-- Exam Selection Dropdown -->
        <form action="{{ route('exam-results.index') }}" method="get">
            <div class="row_input_group">
                <div class="input_group">
                    <label for="exam_id">Exams</label>
                    <select name="exam_id" id="exam_id" onchange="this.form.submit()">
                        <option value="">Select Exam</option>
                        @foreach ($exams as $exam)
                            <option value="{{ $exam->id }}" {{ request('exam_id') == $exam->id ? 'selected' : '' }}>
                                {{ $exam->title.' - '.$exam->year.' '.$exam->term }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
    </div>

    <div class="body">
        <p class="title">{{ request('exam_id') ? 'Students Results' : 'Select an Exam to View Results' }}</p>

        @if (request('exam_id'))
            <!-- Results Table -->
            <form action="{{ route('exam-results.store') }}" method="post">
                @csrf

                <!-- Hidden field for exam_id -->
                <input type="hidden" name="exam_id" value="{{ request('exam_id') }}">

                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Student</th>
                                @foreach ($subjects as $subject)
                                    <th>{!! Illuminate\Support\Str::limit($subject->title, 4, '') !!}</th>
                                @endforeach
                                <th>Actions</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            @foreach ($students as $student)
                                <tr class="searchable">
                                    <td>{{ $student->registration_number }}</td>
    
                                    <!-- Display and Update Marks for Each Student and Subject -->
                                    @foreach ($subjects as $subject)
                                        @php
                                            // Get the existing result for the student and subject for this exam
                                            $result = $student->examResults
                                                ->where('exam_id', request('exam_id'))
                                                ->where('subject_id', $subject->id)
                                                ->first();
                                        @endphp
                                        <td>
                                            <div class="input_group">
                                                <input type="number"
                                                    name="marks[{{ $student->id }}][{{ $subject->id }}]"
                                                    value="{{ $result ? $result->marks : 0 }}" min="0"
                                                    max="100" placeholder="Enter marks">
                                                <span class="inline_alert">{{ $errors->first('marks') }}</span>
                                            </div>
                                        </td>
                                    @endforeach
    
                                    <td>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        @else
            <div class="no-exam-selected">
                <p>Please select an exam to view and update results.</p>
            </div>
        @endif
    </div>
</x-authenticated-layout>
