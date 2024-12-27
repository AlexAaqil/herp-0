<x-admin-layout class="Classes">
    <div class="custom_form">
        <header>
            <p>Update Class Section</p>
        </header>

        <form action="{{ route('class_sections.update', $class_section->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="row_input_group">
                <div class="input_group">
                    <label for="title">Class Section Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $class_section->title) }}" placeholder="Class Section Title">
                    <span class="inline_alert">{{ $errors->first('title') }}</span>
                </div>

                <div class="input_group">
                    <label for="teacher_id">Class Teacher</label>
                    <select name="teacher_id" id="teacher_id">
                        <option value="">Select Class Teacher</option>
                    </select>
                </div>
            </div>

            <div class="buttons">
                <button type="submit">Update</button>

                <button type="button" class="delete_btn" onclick="deleteItem({{ $class_section->id }}, 'class');" form="deleteForm_{{ $class_section->id }}">
                    <i class="fas fa-trash-alt delete"></i>
                    <span>Delete</span>
                </button>
            </div>
        </form>

        <form id="deleteForm_{{ $class_section->id }}" action="{{ route('class_sections.destroy', $class_section->id) }}" method="post" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>

    <x-slot name="javascript">
        <x-sweetalert />
    </x-slot>
</x-admin-layout>
