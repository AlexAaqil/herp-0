<x-general-layout class="Authentication">
    <section class="Login">
        <form method="POST" action="{{ route('login-student') }}">
            @csrf

            <div class="header portals">
                <p>
                    <a href="{{ route('login') }}">Staff</a>
                </p>
                <p class="active">
                    <a href="{{ route('student-login') }}">Student / Parent</a>
                </p>
            </div>

            <div class="input_group">
                <label for="registration_number">Registration Number</label>
                <input type="text" name="registration_number" id="registration_number"
                    placeholder="Registration Number" value="{{ old('registration_number') }}">
                <span class="inline_alert">{{ $errors->first('registration_number') }}</span>
            </div>

            {{-- <div class="input_group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password"
                    value="{{ old('password') }}">
            </div>

            <p>
                <a href="{{ route('password.request') }}">Forgot your password?</a>
            </p> --}}

            <button type="submit">Login</button>
        </form>
    </section>
</x-general-layout>
