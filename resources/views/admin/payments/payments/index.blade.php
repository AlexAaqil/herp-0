<x-authenticated-layout class="Payments">
    <x-admin-header header_title="Payments" :total_count="count($payments)" route="{{ route('payments.create') }}" />

    <div class="body">
        @if (count($payments) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th class="center">ID</th>
                    <th>Title</th>
                    <th>Ref No.</th>
                    <th>Payment</th>
                    <th>Amount</th>
                    <th>Class</th>
                    <th>Period</th>
                </tr>
            </thead>

            <tbody>
                @php $id = 1 @endphp
                @foreach ($payments as $payment)
                    <tr class="searchable">
                        <td class="center">
                            <a href="{{ route('payments.edit', $payment->id) }}">
                                {{ $id++ }}
                            </a>
                        </td>
                        <td>{{ $payment->title }}</td>
                        <td>{{ $payment->reference_number }}</td>
                        <td>{{ $payment->payment_method }}</td>
                        <td>{{ $payment->amount }}</td>
                        <td>{{ $payment->myClass->class_name }}</td>
                        <td>{{ $payment->year.' - Term '.$payment->term }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p>No payments have been added yet</p>
        @endif
    </div>
</x-authenticated-layout>
