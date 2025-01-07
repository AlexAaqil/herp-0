<x-general-layout class="Authentication">
    <section class="Verify_email">
        
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div class="header">
                <p>Verify your email using the link sent to you.</p>
                <br>
                <p>If you didn't receive it, click resend.</p>
            </div>
    
            @if(session('status') == 'verification-link-sent')
                <div class="alert alert-status">
                    Verification link has been sent. Check your email.
                </div>
            @endif

            <button type="submit">Resend Verification Email</button>
        </form>
    </section>
</x-general-layout>
