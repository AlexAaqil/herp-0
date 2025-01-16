<x-app-layout>
    <main class="app_main StudentPortal">
        @include('partials.student_aside')

        <div class="app_content Payment_Receipt">

            <div class="system_nav">
                <span>Gate Pass</span>
            </div>

            <div class="body printable_area" id="printable_area">
                <div class="header">
                    <p class="title">Gate Pass</p>

                    <div class="details">
                        <p>{{ config('globals.school_name') }}</p>
                        <p>{{ config('globals.school_phone_main') }}</p>
                        <p>{{ config('globals.school_email') }}</p>
                        <p>{{ config('globals.school_address') }}</p>
                    </div>
                </div>

                <div class="receipt_body">
                    <div class="payment_details">
                        <p>
                            <span>ADM No.</span>
                            <span>{{ $student->registration_number }}</span>
                        </p>
                        <p>
                            <span>Student:</span>
                            <span>{{ $student->first_name . ' ' . $student->last_name }}</span>
                        </p>
                        <p>
                            <span>Payment Method:</span>
                            <span>{{ ucfirst($payment->payment_method) }}</span>
                        </p>
                        <p>
                            <span>Period:</span>
                            <span>{{ $payment->year . ' Term - ' . $payment->term }}</span>
                        </p>
                    </div>

                    @if ($completedPayment)
                        <p class="success-message">You've completed your payment. You're eligible to print out the gate pass.</p>
                        <div class="print_form">
                            <form action="{{ route('student-gatepass.print') }}" method="POST" target="_blank">
                                @csrf

                                <div class="print-btn">
                                    <button class="btn">Print Gate Pass</button>
                                </div>
                            </form>
                        </div>
                    @else
                        <p class="error-message">Kindly complete the payment to get a gate pass.</p>
                    @endif
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
