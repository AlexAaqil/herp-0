<x-authenticated-layout class="Inventory">
    <x-admin-header header_title="Inventory" :total_count="count($inventories)" route="{{ route('inventory-records.create') }}" />

    <div class="body">
        @if (count($inventories) > 0)
            <table class="table">
                <thead>
                    <th class="center">ID</th>
                    <th>Item</th>
                    <th>Transaction</th>
                    <th>Quantity</th>
                    <th>Remaining</th>
                    <th>Date</th>
                </thead>

                <tbody>
                    @php $id = 1 @endphp
                    @foreach ($inventories as $inventory)
                        <tr class="searchable">
                            <td class="center">
                                <a href="{{ route('inventory-records.edit', $inventory->id) }}">
                                    {{ $id++ }}
                                </a>
                            </td>
                            <td>{{ $inventory->item->title }}</td>
                            <td>{{ $inventory->transaction_type }}</td>
                            <td>{{ $inventory->quantity }}</td>
                            <td>{{ $inventory->remaining ?? "Null" }}</td>
                            <td>{{ $inventory->date->format('d-m-Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No inventory has been added.</p>
        @endif
    </div>
</x-authenticated-layout>
