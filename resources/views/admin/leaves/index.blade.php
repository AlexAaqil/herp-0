<x-authenticated-layout class="Leaves">
    <x-admin-header header_title="Leaves" :total_count="count($leaves)" route="{{ route('leaves.create') }}" />

    <div class="body">
        @if (count($leaves) > 0)
            <table class="table">
                <thead>
                    <th class="center">ID</th>
                    @can('view-as-admin')
                        <th>User</th>
                    @endcan
                    <th>Category</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Reason</th>
                </thead>

                <tbody>
                    @php $id = 1 @endphp
                    @foreach ($leaves as $leave)
                        <tr class="searchable">
                            <td class="center">
                                <a href="{{ route('leaves.edit', $leave->id) }}">
                                    {{ $id++ }}
                                </a>
                            </td>
                            @can('view-as-admin')
                                <td>{{ $leave->user->full_name }}</td>
                            @endcan
                            <td>{{ ucfirst($leave->category) }}</td>
                            <td>{{ $leave->from_date->format('d-m-Y') . ' to ' . $leave->to_date->format('d-m-Y') }}</td>
                            <td class="{{ $leave->status == 'approved' ? 'success' : 'danger' }}">{{ ucfirst($leave->status) }}</td>
                            <td>{!! Illuminate\Support\Str::limit($leave->reason, 30, ' ...') !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>You've not applied for any leaves yet.</p>
        @endif
    </div>
</x-authenticated-layout>
