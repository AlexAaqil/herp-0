<x-authenticated-layout class="Users">
    <div class="system_nav">
        <a href="{{ route('settings.index') }}">Settings</a>
        <span>Teacher's Subjects</span>
    </div>

    <x-admin-header header_title="Teacher's Subjects" :total_count="count($assignments)" />

    <div class="row_container">
        <div class="body">
            @if (count($assignments) > 0)
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Teacher</th>
                                <th>Subject</th>
                                <th>Class</th>
                                <th class="actions"></th>
                            </tr>
                        </thead>
    
                        <tbody>
                            @php $id = 1 @endphp
                            @foreach ($assignments as $assignment)
                                <tr class="searchable">
                                    <td>{{ $assignment->teacher->first_name . ' ' . $assignment->teacher->last_name }}</td>
                                    <td>{{ $assignment->subject->title }}</td>
                                    <td>{{ $assignment->classSection->title }}</td>
                                    <td class="actions">
                                        <div class="action">
                                            <a href="{{ route('subject-teachers.edit', $assignment->id) }}">
                                                <span class="fas fa-eye"></span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p>Teachers have not been assigned to subjects.</p>
            @endif
        </div>

        <div class="custom_form">
            <header>
                <p>New Teacher Subject</p>
            </header>

            <form action="{{ route('subject-teachers.store') }}" method="post">
                @csrf

                <div class="input_group">
                    <label for="class_id">Class</label>
                    <select name="class_section_id" id="class_section_id">
                        <option value="">Select Class</option>
                        @foreach ($classSections as $class)
                            <option value="{{ $class->id }}"
                                {{ old('class_section_id') == $class->id ? 'selected' : '' }}>{{ $class->title }}
                            </option>
                        @endforeach
                    </select>
                    <span class="inline_alert">{{ $errors->first('class_section_id') }}</span>
                </div>

                <div class="input_group">
                    <label for="subject_id">Subject</label>
                    <select name="subject_id" id="subject_id">
                        <option value="">Select Subject</option>
                        @foreach ($subjects as $subject)
                            <option
                                value="{{ $subject->id }}"{{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                                {{ $subject->title }}</option>
                        @endforeach
                    </select>
                    <span class="inline_alert">{{ $errors->first('subject_id') }}</span>
                </div>

                <div class="input_group">
                    <label for="teacher_id">Teacher</label>
                    <select name="teacher_id" id="teacher_id">
                        <option value="">Select Teacher</option>
                        @foreach ($teachers as $teacher)
                            <option
                                value="{{ $teacher->id }}"{{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                                {{ $teacher->first_name . ' ' . $teacher->last_name }}</option>
                        @endforeach
                    </select>
                    <span class="inline_alert">{{ $errors->first('teacher_id') }}</span>
                </div>

                <div class="input_group">
                    <label for="timeslot_id">Timeslot</label>
                    <select name="timeslot_id" id="timeslot_id">
                        <option value="">Select Timeslot</option>
                        @foreach ($timeslots as $timeslot)
                            <option
                                value="{{ $timeslot->id }}"{{ old('timeslot_id') == $timeslot->id ? 'selected' : '' }}>
                                {{ $timeslot->day . ' - ' . $timeslot->start_time . ' ' . $timeslot->endt_time }}</option>
                        @endforeach
                    </select>
                    <span class="inline_alert">{{ $errors->first('timeslot_id') }}</span>
                </div>

                <button type="submit">Save</button>
            </form>
        </div>
    </div>
</x-authenticated-layout>
