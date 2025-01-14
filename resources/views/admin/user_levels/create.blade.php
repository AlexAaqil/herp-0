<x-authenticated-layout class="User_levels">
    <div class="custom_form">
        <header>
            <p>New User Level</p>
        </header>

        <form action="{{ route('user-levels.store') }}" method="post">
            @csrf

            <div class="input_group">
                <label for="user_level">User Level</label>
                <input type="number" name="user_level" id="user_level" value="{{ old('user_level') }}">
                <span class="inline_alert">{{ $errors->first('user_level') }}</span>
            </div>

            <div class="input_group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}">
                <span class="inline_alert">{{ $errors->first('title') }}</span>
            </div>

            <button type="submit">Save</button>
        </form>
    </div>
</x-authenticated-layout>
