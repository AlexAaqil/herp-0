<x-authenticated-layout class="Users">
    <div class="custom_form">
        <header>
            <p>Update Teacher</p>

            <div class="navigation">
                <a href="{{ route('teachers.index') }}">Teachers</a>
                <span>/ Update</span>
            </div>
        </header>

        <form action="{{ route('teachers.update', ['teacher' => $teacher->id]) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="row_input_group">
                <div class="input_group">
                    <label for="user_level" class="required">User Level</label>
                    @php
                        $selectedUserLevel = old('user_level', $teacher->user_level);
                    @endphp
                    <select name="user_level" id="user_level" required>
                        <option value="" disabled {{ empty($selectedUserLevel) ? 'selected' : '' }}>Select User
                            Level</option>
                        @foreach ($user_levels as $user_level)
                            <option value="{{ $user_level->user_level }}"
                                {{ $selectedUserLevel == $user_level->user_level ? 'selected' : '' }}>
                                {{ $user_level->title }}
                            </option>
                        @endforeach
                    </select>
                    <span class="inline_alert">{{ $errors->first('user_level') }}</span>
                </div>

                <div class="input_group">
                    <label for="emp_code">Employee Code</label>
                    <input type="text" name="emp_code" id="emp_code" placeholder="Employee Code"
                        value={{ old('emp_code', $teacher->emp_code) }}>
                    <span class="inline_alert">{{ $errors->first('emp_code') }}</span>
                </div>
            </div>

            <div class="row_input_group">
                <div class="input_group">
                    <label for="first_name" class="required">First Name</label>
                    <input type="text" name="first_name" id="first_name" placeholder="First Name"
                        value={{ old('first_name', $teacher->first_name) }}>
                    <span class="inline_alert">{{ $errors->first('first_name') }}</span>
                </div>

                <div class="input_group">
                    <label for="last_name" class="required">Last Name</label>
                    <input type="text" name="last_name" id="last_name" placeholder="Last Name"
                        value={{ old('last_name', $teacher->last_name) }}>
                    <span class="inline_alert">{{ $errors->first('last_name') }}</span>
                </div>
            </div>

            <div class="row_input_group">
                <div class="input_group">
                    <label for="email">Email Address (Can't be updated)</label>
                    <input type="email" class="danger" name="email" id="email" placeholder="Email Address"
                        value="{{ old('email', $teacher->email) }}" disabled>
                    <span class="inline_alert">{{ $errors->first('email') }}</span>
                </div>

                <div class="input_group">
                    <label for="phone_main" class="required">Phone Number</label>
                    <input type="text" name="phone_main" id="phone_main" placeholder="Phone Number"
                        value="{{ old('phone_main', $teacher->phone_main) }}">
                    <span class="inline_alert">{{ $errors->first('phone_main') }}</span>
                </div>
            </div>

            <div class="row_input_group">
                <div class="input_group">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password"
                        placeholder="Leave as blank for generated password">
                    <span class="inline_alert">{{ $errors->first('password') }}</span>
                </div>

                <div class="input_group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="text" name="password_confirmation" id="password_confirmation"
                        placeholder="Leave as blank for generated password">
                    <span class="inline_alert">{{ $errors->first('password_confirmation') }}</span>
                </div>
            </div>

            <div class="buttons">
                <button type="submit">Update</button>

                <button type="button" class="btn_danger" onclick="deleteItem({{ $teacher->id }}, 'user');"
                    form="deleteForm_{{ $teacher->id }}">
                    <i class="fas fa-trash-alt delete"></i>
                    <span>Delete</span>
                </button>
            </div>
        </form>

        <form id="deleteForm_{{ $teacher->id }}" action="{{ route('users.destroy', $teacher->id) }}" method="post"
            style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>

    <div class="custom_form">
        <header>
            <p>Teacher's Schedule</p>

            <div class="navigation">
                <a href="{{ route('teachers.index') }}">Teachers</a>
            </div>
        </header>

        <form action="{{ route('subject-teachers.store') }}" method="post">
            @csrf

            <div class="details">
                @forelse ($teacher->sectionSubjectTeachers as $assignment)
                    <p>{{ $assignment->timeslot->day . ' : '. $assignment->timeslot->time . ' : '. $assignment->subject->title . ' ('.$assignment->classSection->title.')' }}</p>
                @empty
                    <p>No schedule has been set.</p>
                @endforelse
            </div>

            <input type="hidden" name="teacher_id" value="{{ $teacher->id }}">

            <div class="row_input_group_3">
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
                    <label for="timeslot_id">Timeslot</label>
                    <select name="timeslot_id" id="timeslot_id">
                        <option value="">Select Timeslot</option>
                        @foreach ($timeslots as $timeslot)
                            <option
                                value="{{ $timeslot->id }}"{{ old('timeslot_id') == $timeslot->id ? 'selected' : '' }}>
                                {{ $timeslot->day . ' : ' . $timeslot->start_time . ' - ' . $timeslot->end_time }}</option>
                        @endforeach
                    </select>
                    <span class="inline_alert">{{ $errors->first('timeslot_id') }}</span>
                </div>
            </div>

            <button type="submit">Save</button>
        </form>
    </div>

    <x-slot name="javascript">
        <x-sweetalert />
    </x-slot>
</x-authenticated-layout>
