<x-app-layout>
    <section class="Printable">
        <div class="header">
            <div class="row">
                <p class="title">Fees Receipt</p>

                <div class="details">
                    <p>{{ config('globals.app_full_name') }}</p>
                    <p>{{ config('globals.phone_number') }}</p>
                    <p>{{ config('globals.email') }}</p>
                    <p>{{ config('globals.address') }}</p>
                </div>
            </div>
        </div>

        <div class="body">
            <div class="student">
                <p>ADM No. {{ $student->registration_number }}</p>
                <p>{{ $student->first_name . ' ' . $student->last_name }}</p>
            </div>

            <div class="payment_details">
                <p>
                    <span>Reference Number:</span>
                    <span>{{ $payment->reference_number }}</span>
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

            <div class="payment_receipts">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th class="center">Amount Paid (Kshs)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($receipts as $receipt)
                            <tr>
                                <td>{{ $receipt->date_paid }}</td>
                                <td class="center">{{ number_format($receipt->amount_paid, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="payment">
                <p>
                    <span>Total Amount Due:</span>
                    <span>{{ number_format($payment->amount, 2) }}</span>
                </p>
                <p>
                    <span>Amount Paid:</span>
                    <span>{{ number_format($paymentRecord->amount_paid, 2) }}</span>
                </p>
                <p>
                    <span>Balance:</span>
                    <span class="danger">{{ number_format($paymentRecord->balance, 2) }}</span>
                </p>
            </div>
        </div>

        <div class="footer">
            <p>Thank you for your payment!</p>
            <p>For any queries, feel free to contact us at {{ config('globals.email') }}</p>
        </div>
    </section>

    <script type="text/javascript">
        window.onload = function() {
            window.print();
        };
    </script>
</x-app-layout>
