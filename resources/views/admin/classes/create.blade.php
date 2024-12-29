<x-authenticated-layout class="Classes">
    <div class="custom_form">
        <header>
            <p>New Class</p>
        </header>

        <form action="{{ route('classes.store') }}" method="post">
            @csrf

            <div class="input_group">
                <label for="class_name">Name of the class</label>
                <input type="text" name="class_name" id="class_name" placeholder="Form 1"
                    value="{{ old('class_name') }}">
                <span class="inline_alert">{{ $errors->first('class_name') }}</span>
            </div>

            <button type="submit">Save</button>
        </form>
    </div>
</x-authenticated-layout>
