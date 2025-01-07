<x-general-layout class="Authentication">
    <section class="Login">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="header portals">
                <p class="active">
                    <a href="{{ route('login') }}">Staff</a>
                </p>
                <p>
                    <a href="{{ route('student-login') }}">Student / Parent</a>
                </p>
            </div>

            <div class="input_group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" placeholder="Email Address"
                    value="{{ old('email') }}">
                <span class="inline_alert">{{ $errors->first('email') }}</span>
            </div>

            <div class="input_group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password"
                    value="{{ old('password') }}">
            </div>

            <p>
                <a href="{{ route('password.request') }}">Forgot your password?</a>
            </p>

            <button type="submit">Login</button>
        </form>
    </section>
</x-general-layout>
