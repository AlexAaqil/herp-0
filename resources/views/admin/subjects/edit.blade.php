<x-authenticated-layout class="Subjects">
    <div class="custom_form">
        <div class="system_nav">
            <a href="{{ route('settings.index') }}">Settings</a>
            <a href="{{ route('subjects.index') }}">/ Subjects</a>
            <span>/ Edit</span>
        </div>

        <header>
            <p>Update Subject</p>
        </header>

        <form action="{{ route('subjects.update', $subject->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="input_group">
                <label for="title">Subject</label>
                <input type="text" name="title" id="title" placeholder="Subject"
                    value="{{ old('title', $subject->title) }}">
                <span class="inline_alert">{{ $errors->first('title') }}</span>
            </div>

            <div class="input_group">
                <label for="short_name">Short Name</label>
                <input type="text" name="short_name" id="short_name"
                    value="{{ old('short_name', $subject->short_name) }}">
                <span class="inline_alert">{{ $errors->first('short_name') }}</span>
            </div>

            <div class="input_group">
                <label for="code">Code</label>
                <input type="text" name="code" id="code" value="{{ old('code', $subject->code) }}">
                <span class="inline_alert">{{ $errors->first('code') }}</span>
            </div>

            <div class="buttons">
                <button type="submit">Update</button>

                <button type="button" class="btn_danger" onclick="deleteItem({{ $subject->id }}, 'subject');"
                    form="deleteForm_{{ $subject->id }}">
                    <i class="fas fa-trash-alt delete"></i>
                    <span>Delete</span>
                </button>
            </div>
        </form>

        <form id="deleteForm_{{ $subject->id }}" action="{{ route('subjects.destroy', $subject->id) }}"
            method="post" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>

    <x-slot name="javascript">
        <x-sweetalert />
    </x-slot>
</x-authenticated-layout>
