<x-authenticated-layout class="Inventory">
    <x-admin-header header_title="Inventory" :total_count="count($inventories)" route="{{ route('inventory-records.create') }}" />

    <div class="body">
        @if (count($inventories) > 0)
            <table class="table">
                <thead>
                    <th>Item</th>
                    <th>Transaction</th>
                    <th>Quantity</th>
                    <th>Remaining</th>
                    <th>Date</th>
                    <th class="actions"></th>
                </thead>

                <tbody>
                    @foreach ($inventories as $inventory)
                        <tr class="searchable">
                            <td>{{ $inventory->item->title }}</td>
                            <td>{{ $inventory->transaction_type }}</td>
                            <td>{{ $inventory->quantity }}</td>
                            <td>{{ $inventory->remaining ?? "Null" }}</td>
                            <td>{{ $inventory->date->format('d-m-Y') }}</td>
                            <td class="actions">
                                <div class="action">
                                    <a href="{{ route('inventory-records.edit', $inventory->id) }}">
                                        <span class="fas fa-eye"></span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No inventory has been added.</p>
        @endif
    </div>
</x-authenticated-layout>
