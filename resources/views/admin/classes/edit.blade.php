<x-authenticated-layout class="Classes">
    <div class="custom_form">
        
        <header>
            <p>Edit Class</p>
            
            <div class="system_nav">
                <a href="{{ route('settings.index') }}">Settings</a>
                <a href="{{ route('classes.index') }}">Classes</a>
                <span>Edit</span>
            </div>
        </header>

        <form action="{{ route('classes.update', $classes->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="input_group">
                <label for="class_name">Name of the class</label>
                <input type="text" name="class_name" id="class_name" placeholder="1 North"
                    value="{{ old('class_name', $classes->class_name) }}">
                <span class="inline_alert">{{ $errors->first('class_name') }}</span>
            </div>

            <div class="buttons">
                <button type="submit">Update</button>

                <button type="button" class="btn_danger" onclick="deleteItem({{ $classes->id }}, 'class');"
                    form="deleteForm_{{ $classes->id }}">
                    <i class="fas fa-trash-alt delete"></i>
                    <span>Delete</span>
                </button>
            </div>
        </form>

        <form id="deleteForm_{{ $classes->id }}" action="{{ route('classes.destroy', $classes->id) }}" method="post"
            style="display: none;">
            @csrf
            @method('DELETE')
        </form>

        <div class="class_sections another_form">
            <div class="heading_section">
                <p>Class Sections</p>
                <form action="{{ route('class_sections.store') }}" method="post">
                    @csrf

                    <input type="hidden" name="class_id" id="class_id" value="{{ $classes->id }}">

                    <div class="row_input_group_3">
                        <div class="input_group">
                            <input type="text" name="title" id="title" value="{{ old('title') }}"
                                placeholder="Class Section Name">
                            <span class="inline_alert">{{ $errors->first('title') }}</span>
                        </div>

                        <div class="input_group">
                            <select name="teacher_id" id="teacher_id">
                                <option value="">Select Class Teacher</option>
                            </select>
                        </div>

                        <button type="submit">New</button>
                    </div>
                </form>
            </div>

            <div class="sections">
                @if (count($class_sections) > 0)
                    @foreach ($class_sections as $class_section)
                        <p>
                            <span>
                                <a
                                    href="{{ route('class_sections.edit', $class_section->id) }}">{{ $class_section->title }}</a>
                                -
                            </span>
                            <span>{{ $class_section->teacher_id ?? 'Teacher is unknown' }}</span>
                        </p>
                    @endforeach
                @else
                    <p>No class section added yet</p>
                @endif
            </div>
        </div>
    </div>

    <x-slot name="javascript">
        <x-sweetalert />
    </x-slot>
</x-authenticated-layout>
