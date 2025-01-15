<x-authenticated-layout class="PaymentRecords">
    <div class="body">
        @if ($paymentRecords->isNotEmpty())
            <p class="title">
                Manage Payments:
            </p>
            <p>
                {{ $paymentRecords->first()->student ? $paymentRecords->first()->student->first_name.' '.$paymentRecords->first()->student->last_name.' - '.$paymentRecords->first()->student->registration_number : 'No available payments' }}
            </p>
        @else
            <p class="title">No payment records available for this student.</p>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Period</th>
                    <th>Title</th>
                    <th>Amount</th>
                    <th>Paid</th>
                    <th>Balance</th>
                    <th>Pay Now</th>
                    <th class="center">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($paymentRecords as $record)
                    <tr>
                        <td>{{ $record->payment->year.' - Term '.$record->payment->term }}</td>
                        <td>{{ $record->payment->title }}</td>
                        <td>{{ $record->payment->amount }}</td>
                        <td class="info">{{ $record->amount_paid }}</td>
                        <td class="{{ $record->balance == 0 ? 'success' : 'danger' }}">{{ $record->balance }}</td>
                        <td>
                            <form action="{{ route('payment-records.store') }}" method="POST" class="inline">
                                @csrf
                                <input type="hidden" name="student_id" value="{{ $student_id }}">
                            
                                <input type="number" name="amount_paid[{{ $record->id }}]" value="{{ old('amount_paid.'.$record->id, '') }}" min="0" step="0.01" placeholder="Amount Paid">
                                @if ($errors->has("amount_paid.{$record->id}"))
                                    <span class="error">{{ $errors->first("amount_paid.{$record->id}") }}</span>
                                @endif
                                
                                <button type="submit" class="btn_info">Pay</button>
                            </form>
                        </td>
                        <td>
                            <div class="actions">
                                <div class="action">
                                    <a href="{{ route('receipts.print', $record->id) }}" target="_blank" class="btn_link">Print</a>
                                </div>
                                <div class="action">
                                    @if ($record->balance == 0 || auth()->user()->user_level < 2)
                                        <a href="#"> Gate Pass</a>
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-authenticated-layout>
