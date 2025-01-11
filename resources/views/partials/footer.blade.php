<footer>
    <div class="container">
        <section class="branding">
            <div class="image">
                <x-app-logo />
            </div>
            <p class="title">{{ $appSettings['school_name'] ?? config('globals.school_name') }}</p>
            <p>{{ $appSettings['school_slogan'] ?? config('globals.school_slogan') }}</p>
            <p>{{ $appSettings['school_address'] ?? config('globals.school_address') }}</p>
        </section>

        <section class="links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('about') }}">About</a>
            <a href="{{ route('services') }}">Services</a>
            <a href="{{ route('contact') }}">Contact</a>
        </section>

        <section class="contacts">
            <div class="details">
                <p>
                    {{ $appSettings['school_phone_main'] ?? config('globals.school_phone_main') }}
                    @if(!empty($appSettings['school_phone_other']))
                        / {{ $appSettings['school_phone_other'] }}
                    @endif
                </p>
                <p>{{ $appSettings['school_email'] ?? config('globals.school_email') }}</p>
            </div>

            <div class="socials">
                <a href="https://wa.me/{{ $appSettings['whatsapp_number'] ?? config('globals.whatsapp_number') }}">
                    <img src="{{ asset('assets/images/whatsapp.png') }}" alt="{{ config('globals.school_name') }} Whatsapp">
                </a>

                <a href="#">
                    <img src="{{ asset('assets/images/instagram.png') }}" alt="{{ config('globals.school_name') }} Instagram">
                </a>
            </div>
        </section>
    </div>

    <p class="copyright">&copy; 2024 | All rights reserved</p>
</footer>