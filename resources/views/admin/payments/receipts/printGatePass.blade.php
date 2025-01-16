<x-app-layout>
    <section class="Payment_Receipt">
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
            </div>
    
            <div class="payment_details">
                @if (!empty($comment))
                    <p class="custom-comment">
                        <strong class="danger">Temporary Gate Pass:</strong> {{ $comment }}
                    </p>
                @elseif ($paymentRecords->isEmpty())
                    <p>No payment records found for the selected term and year.</p>
                @else
                    <p class="success">Has completed payment.</p>
                    <p><strong>Gate Pass Serial Number:</strong> {{ uniqid('GP-', true) }}</p>
                    <p><strong>Security Code:</strong> {{ sha1($student->registration_number . now()->timestamp) }}</p>
                @endif
            </div>
        </div>
    </section>

    <script type="text/javascript">
        window.onload = function() {
            window.print();
        };
    </script>
</x-app-layout>
