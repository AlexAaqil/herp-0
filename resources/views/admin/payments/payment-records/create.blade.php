<x-authenticated-layout class="PaymentRecords">
    <div class="system_nav">
        <a href="{{ route('payment-records.index') }}">Payment Records</a>
        <a href="{{ route('payment-receipt.select', $paymentRecords->first()->student->id) }}">Print Receipt</a>
        <a href="{{ route('payment-gatepass.select', $paymentRecords->first()->student->id) }}">Gate Pass</a>
        <span>Manage Payments</span>
    </div>

    <div class="body">
        @if ($paymentRecords->isNotEmpty())
            <p class="title">
                {{ $paymentRecords->first()->student ? $paymentRecords->first()->student->registration_number . ' - ' . $paymentRecords->first()->student->first_name . ' ' . $paymentRecords->first()->student->last_name : 'No available payments' }}
            </p>
        @else
            <p class="title">No payment records available for this student.</p>
        @endif

        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>Period</th>
                        <th>Title</th>
                        <th>Amount</th>
                        <th>Paid</th>
                        <th>Balance</th>
                        <th>Pay Now</th>
                    </tr>
                </thead>
    
                <tbody>
                    @foreach ($paymentRecords as $record)
                        <tr>
                            <td>{{ $record->payment->year . ' - Term ' . $record->payment->term }}</td>
                            <td>{{ $record->payment->title }}</td>
                            <td>{{ $record->payment->amount }}</td>
                            <td class="info">{{ $record->amount_paid }}</td>
                            <td class="{{ $record->balance == 0 ? 'success' : 'danger' }}">{{ $record->balance }}</td>
                            <td>
                                <form action="{{ route('payment-records.store') }}" method="POST" class="inline">
                                    @csrf
                                    <input type="hidden" name="student_id" value="{{ $student_id }}">
    
                                    <input type="number" name="amount_paid[{{ $record->id }}]"
                                        value="{{ old('amount_paid.' . $record->id, '') }}" min="0" step="0.01"
                                        placeholder="Amount Paid">
                                    @if ($errors->has("amount_paid.{$record->id}"))
                                        <span class="error">{{ $errors->first("amount_paid.{$record->id}") }}</span>
                                    @endif
    
                                    <button type="submit" class="btn_info">Pay</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-authenticated-layout>
