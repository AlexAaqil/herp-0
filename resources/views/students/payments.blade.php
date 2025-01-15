<x-app-layout>
    <main class="app_main StudentPortal">
        @include('partials.student_aside')

        <div class="app_content">
            <h2>Payments</h2>

            @if ($payments->isEmpty())
                <p>No payments have been added yet.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Period</th>
                            <th>Title</th>
                            <th>Amount</th>
                            <th>Paid</th>
                            <th>Balance</th>
                            <th class="center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($payments as $record)
                            <tr>
                                <td>{{ $record->payment->year . ' - Term ' . $record->payment->term }}</td>
                                <td>{{ $record->payment->title }}</td>
                                <td>{{ $record->payment->amount }}</td>
                                <td class="info">{{ $record->amount_paid }}</td>
                                <td class="{{ $record->balance == 0 ? 'success' : 'danger' }}">{{ $record->balance }}
                                </td>
                                <td class="center">
                                    <a href="{{ route('receipts.print', $record->id) }}" target="_blank"
                                        class="btn_link">Print</a>
                                    @if ($record->balance == 0)
                                        <a href="#"> Gate Pass</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </main>
</x-app-layout>
