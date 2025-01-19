<x-authenticated-layout class="Dorms">
    <div class="custom_form">
        <header>
            <p>Update Dorm</p>

            <div class="system_nav">
                <a href="{{ route('settings.index') }}">Settings</a>
                <a href="{{ route('dorms.index') }}">/ Dorms</a>
                <span>/ Edit</span>
            </div>
        </header>

        <form action="{{ route('dorms.update', $dorm->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="input_group">
                <label for="title">Dorm Name</label>
                <input type="text" name="title" id="title" value="{{ old('title', $dorm->title) }}">
                <span class="inline_alert">{{ $errors->first('title') }}</span>
            </div>

            <div class="buttons">
                <button type="submit">Update</button>

                <button type="button" class="btn_danger" onclick="deleteItem({{ $dorm->id }}, 'dorm');"
                    form="deleteForm_{{ $dorm->id }}">
                    <i class="fas fa-trash-alt delete"></i>
                    <span>Delete</span>
                </button>
            </div>
        </form>

        <form id="deleteForm_{{ $dorm->id }}" action="{{ route('dorms.destroy', $dorm->id) }}" method="post"
            style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>

    <x-slot name="javascript">
        <x-sweetalert />
    </x-slot>
</x-authenticated-layout>
