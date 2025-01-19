<x-app-layout>
    <section class="Payment_Receipt">
        <div class="body printable_area" id="printable_area">
            <div class="header">
                <p class="title">Fees Receipt</p>
    
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
                @if ($paymentRecords->isEmpty())
                    <p>No payment records found for the selected term and year.</p>
                @else
                    <div class="table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Amount</th>
                                    <th>Paid</th>
                                    <th>Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalAmount = 0;
                                    $totalPaid = 0;
                                    $totalBalance = 0;
                                @endphp
                                @foreach ($paymentRecords as $record)
                                    <tr>
                                        <td>{{ $record->payment->title }}</td>
                                        <td>{{ number_format($record->payment->amount, 2) }}</td>
                                        <td>{{ number_format($record->amount_paid, 2) }}</td>
                                        <td>{{ number_format($record->balance, 2) }}</td>
        
                                        @php
                                            $totalAmount += $record->payment->amount;
                                            $totalPaid += $record->amount_paid;
                                            $totalBalance += $record->balance;
                                        @endphp
                                    </tr>
                                @endforeach
                                <tr>
                                    <td><strong>Total</strong></td>
                                    <td><strong>{{ number_format($totalAmount, 2) }}</strong></td>
                                    <td><strong>{{ number_format($totalPaid, 2) }}</strong></td>
                                    <td>
                                        <strong>
                                            @if ($totalBalance == 0)
                                                Fully Paid
                                            @else
                                                {{ number_format($totalBalance, 2) }}
                                            @endif
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
            
            <div class="footer">
                <p>Thank you for your payment!</p>
                <p>For any queries, feel free to contact us at {{ config('globals.school_email') }}</p>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        window.onload = function() {
            window.print();
        };
    </script>
</x-app-layout>
