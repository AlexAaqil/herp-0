<x-authenticated-layout class="Users">
    <div class="custom_form">
        <header>
            <p>New User</p>
        </header>

        <form action="{{ route('users.store') }}" method="post">
            @csrf

            <div class="row_input_group">
                <div class="input_group">
                    <label for="user_level">User Level</label>
                    <select name="user_level" id="user_level">
                        <option value="" {{ old('user_level') === null ? 'selected' : '' }}>User Level</option>
                        @foreach ($user_levels as $user_level)
                            <option value="{{ $user_level->user_level }}"
                                {{ old('user_level', 3) == $user_level->user_level ? 'selected' : '' }}>
                                {{ $user_level->title }}
                            </option>
                        @endforeach
                    </select>
                    <span class="inline_alert">{{ $errors->first('user_level') }}</span>
                </div>


                <div class="input_group">
                    <label for="emp_code">Employee Code</label>
                    <input type="text" name="emp_code" id="emp_code" placeholder="Employee Code"
                        value={{ old('emp_code') }}>
                    <span class="inline_alert">{{ $errors->first('emp_code') }}</span>
                </div>
            </div>

            <div class="row_input_group">
                <div class="input_group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" id="first_name" placeholder="First Name"
                        value={{ old('first_name') }}>
                    <span class="inline_alert">{{ $errors->first('first_name') }}</span>
                </div>

                <div class="input_group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" id="last_name" placeholder="Last Name"
                        value={{ old('last_name') }}>
                    <span class="inline_alert">{{ $errors->first('last_name') }}</span>
                </div>
            </div>

            <div class="row_input_group">
                <div class="input_group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" placeholder="Email Address"
                        value="{{ old('email') }}">
                    <span class="inline_alert">{{ $errors->first('email') }}</span>
                </div>

                <div class="input_group">
                    <label for="phone_main">Phone Number</label>
                    <input type="text" name="phone_main" id="phone_main" placeholder="Phone Number"
                        value="{{ old('phone_main') }}">
                    <span class="inline_alert">{{ $errors->first('phone_main') }}</span>
                </div>
            </div>

            <div class="row_input_group">
                <div class="input_group">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password"
                        placeholder="Leave as blank for default password (hsms1234)">
                    <span class="inline_alert">{{ $errors->first('password') }}</span>
                </div>

                <div class="input_group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="text" name="password_confirmation" id="password_confirmation"
                        placeholder="Leave as blank for default password">
                    <span class="inline_alert">{{ $errors->first('password_confirmation') }}</span>
                </div>
            </div>

            <button type="submit">Signup</button>
        </form>
    </div>

    <x-slot name="javascript">
        <x-text-editor />
    </x-slot>
</x-authenticated-layout>
