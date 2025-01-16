<x-authenticated-layout class="Payment_Receipt GatePass">
    <div class="system_nav">
        <a href="{{ route('payment-records.create', $student->id) }}">Payment Records</a>
        <span>/ Gate Pass</span>
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
                <p class="success-message">Has completed Payment and the gatepass is valid</p>
                <div class="print_form">
                    <form action="{{ route('payment-gatepass.print') }}" method="GET" target="_blank">
                        @csrf

                        <div class="print-btn">
                            <button class="btn">Print Gate Pass</button>
                        </div>
                    </form>
                </div>
            @else
                <p class="error-message">Payment incomplete. Kindly complete the payment to get a gate pass.</p>

                @can('view-as-admin')
                    <div class="custom_form">
                        <header>
                            <p>Or you can generate the gatepass manually</p>
                        </header>
                        <form action="{{ route('payment-gatepass.print') }}" method="POST" target="_blank">
                            @csrf
    
                            <div class="row_input_group">
                                <div class="input_group">
                                    <label for="comment">Comment</label>
                                    <input type="text" name="comment" id="comment">
                                </div>
                            </div>
                            <button type="submit">Generate Gate Pass Manually</button>
                        </form>
                    </div>
                @endcan
            @endif
        </div>
    </div>
</x-authenticated-layout>
