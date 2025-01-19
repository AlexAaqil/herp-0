<x-app-layout>
    <main class="app_main StudentPortal">
        @include('partials.student_aside')

        <div class="app_content">
            <div class="system_nav">
                <a href="{{ route('student-receipt.select') }}">Receipt</a>
                <a href="{{ route('student-gatepass.select') }}">Gate Pass</a>
            </div>

            @if ($payments->isEmpty())
                <p>No payments have been added yet.</p>
            @else
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Period</th>
                                <th>Title</th>
                                <th>Amount</th>
                                <th>Paid</th>
                                <th>Balance</th>
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </main>
</x-app-layout>
