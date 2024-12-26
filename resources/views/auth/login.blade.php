<x-general-layout class="Authentication">
    <section class="Login">
        <div class="container">
            <div class="portals">
                <p class="portal active">
                    <a href="{{ route('login') }}">Staff</a>
                </p>
                <p class="portal">
                    <a href="#">Student</a>
                </p>
                <p class="portal">
                    <a href="#">Parent</a>
                </p>
            </div>

            <div class="login_form custom_form">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

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
            </div>
        </div>
    </section>
    {{-- <section class="container Login">
        <div class="custom_form">
            <form method="POST" action="{{ route('login') }}">
                @csrf
        
                <div class="input_group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" placeholder="Email Address" value="{{ old('email') }}">
                    <span class="inline_alert">{{ $errors->first('email') }}</span>
                </div>
        
                <div class="input_group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" value="{{ old('password') }}">
                </div>
        
                <p>
                    <a href="{{ route('password.request') }}">Forgot your password?</a>
                </p>
        
                <button type="submit">Login</button>
            </form>
        
            <p>Don't have an account? <a href="{{ route('register') }}">Signup</a></p>
        </div>
    </section> --}}
</x-general-layout>
