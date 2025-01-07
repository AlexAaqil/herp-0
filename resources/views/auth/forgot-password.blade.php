<x-general-layout class="Authentication">
    <section class="Forgot_Password">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="header">
                <p>
                    Enter your email address to receive the password reset link.
                </p>
            </div>

            <div class="input_group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    placeholder="Enter you Email Address" autofocus />
                <span class="inline_alert">{{ $errors->first('email') }}</span>
            </div>

            <button type="submit">Email Password Reset Link</button>
        </form>
    </section>
</x-general-layout>
