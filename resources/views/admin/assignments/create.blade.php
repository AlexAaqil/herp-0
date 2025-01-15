<x-authenticated-layout class="Assignments">
    <x-searchable-select-header />

    <div class="custom_form">
        <header>
            <p>New Assignment</p>
        </header>

        <form action="{{ route('assignments.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row_input_group">
                <div class="input_group">
                    <label for="class_section_id">Class</label>
                    <select name="class_section_id" id="class_section_id">
                        <option value="">Select Class</option>
                        @foreach ($classes as $class)
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
            </div>

            <div class="row_input_group_3">
                <div class="input_group">
                    <label for="date_issued">Date Issued</label>
                    <input type="date" name="date_issued" id="date_issued"
                        value="{{ old('date_issued', now()->format('Y-m-d')) }}"
                        max="{{ now()->addMonths(2)->format('Y-m-d') }}">
                    <span class="inline_alert">{{ $errors->first('date_issued') }}</span>
                </div>

                <div class="input_group">
                    <label for="deadline">Deadline</label>
                    <input type="date" name="deadline" id="deadline"
                        value="{{ old('deadline') }}"
                        max="{{ now()->addMonths(2)->format('Y-m-d') }}">
                    <span class="inline_alert">{{ $errors->first('deadline') }}</span>
                </div>

                <div class="input_group">
                    <label for="uploaded_assignment">Upload Assignment</label>
                    <input type="file" name="uploaded_assignment" id="uploaded_assignment">
                    <span class="inline_alert">{{ $errors->first('uploaded_assignment') }}</span>
                </div>
            </div>

            <div class="input_group">
                <label for="description">Description</label>
                <textarea name="description" id="editor_ckeditor" cols="30" rows="10" placeholder="Enter your description">{{ old('description') }}</textarea>
                <span class="inline_alert">{{ $errors->first('description') }}</span>
            </div>

            <button type="submit">Save</button>
        </form>
    </div>

    <x-slot name="javascript">
        <x-searchable-select-js />
        <x-text-editor />
    </x-slot>
</x-authenticated-layout>
