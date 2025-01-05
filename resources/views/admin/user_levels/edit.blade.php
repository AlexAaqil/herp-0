<x-authenticated-layout class="User_levels">
    <div class="custom_form">
        <div class="system_nav">
            <a href="{{ route('settings.index') }}">Settings</a>
            <a href="{{ route('user-levels.index') }}">/ User Levels</a>
            <span>/ Edit</span>
        </div>

        <header>
            <p>Update User Level</p>
        </header>

        <form action="{{ route('user-levels.update', $user_level->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="input_group">
                <label for="user_level">User Level</label>
                <input type="number" name="user_level" id="user_level"
                    value="{{ old('user_level', $user_level->user_level) }}">
                <span class="inline_alert">{{ $errors->first('user_level') }}</span>
            </div>

            <div class="input_group">
                <label for="user_level">User Level</label>
                <input type="text" name="title" id="title" value="{{ old('title', $user_level->title) }}">
                <span class="inline_alert">{{ $errors->first('title') }}</span>
            </div>

            <button type="submit">Save</button>
        </form>
    </div>
</x-authenticated-layout>
