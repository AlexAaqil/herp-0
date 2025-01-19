<x-app-layout>
    <section class="Payment_Receipt">
        <div class="body printable_area" id="printable_area">
            <div class="header">
                <p class="title">Receipt</p>
    
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
                        <span>Date:</span>
                        <span>{{ $expense->date->format('d-m-Y') }}</span>
                    </p>
                </div>
            </div>
    
            <div class="payment_details">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $expense->description }}</td>
                            <td>{{ number_format($expense->amount_paid, 2) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="footer">
                <p>Thank you for your partnership!</p>
                <p>For any queries about this receipt, feel free to contact us at {{ config('globals.school_email') . ' / ' . config('globals.school_phone_main') }}</p>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        window.onload = function() {
            window.print();
        };
    </script>
</x-app-layout>
