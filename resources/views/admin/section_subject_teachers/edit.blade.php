<x-authenticated-layout class="Users">
    <div class="custom_form">
        <header>
            <p>Update Teacher Subject</p>

            <div class="system_nav">
                <a href="{{ route('settings.index') }}">Settings</a>
                <a href="{{ route('subject-teachers.index') }}">/ Teacher Subjects</a>
                <span>/ Edit</span>
            </div>
        </header>

        <form action="{{ route('subject-teachers.update', $subject_teacher->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="input_group">
                <label for="class_id">Class</label>
                <select name="class_section_id" id="class_section_id">
                    <option value="">Select Class</option>
                    @foreach ($classSections as $class)
                        <option value="{{ $class->id }}"
                            {{ old('class_section_id', $subject_teacher->class_section_id) == $class->id ? 'selected' : '' }}>
                            {{ $class->title }}</option>
                    @endforeach
                </select>
                <span class="inline_alert">{{ $errors->first('class_section_id') }}</span>
            </div>

            <div class="input_group">
                <label for="subject_id">Subject</label>
                <select name="subject_id" id="subject_id">
                    <option value="">Select Subject</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}"
                            {{ old('subject_id', $subject_teacher->subject_id) == $subject->id ? 'selected' : '' }}>
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
                        <option value="{{ $teacher->id }}"
                            {{ old('teacher_id', $subject_teacher->teacher_id) == $teacher->id ? 'selected' : '' }}>
                            {{ $teacher->first_name . ' ' . $teacher->last_name }}</option>
                    @endforeach
                </select>
                <span class="inline_alert">{{ $errors->first('teacher_id') }}</span>
            </div>

            <div class="buttons">
                <button type="submit">Update</button>

                <button type="button" class="btn_danger"
                    onclick="deleteItem({{ $subject_teacher->id }}, 'teachers subject');"
                    form="deleteForm_{{ $subject_teacher->id }}">
                    <i class="fas fa-trash-alt delete"></i>
                    <span>Delete</span>
                </button>
            </div>
        </form>

        <form id="deleteForm_{{ $subject_teacher->id }}"
            action="{{ route('subject-teachers.destroy', $subject_teacher->id) }}" method="post"
            style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>

    <x-slot name="javascript">
        <x-sweetalert />
    </x-slot>
</x-authenticated-layout>
