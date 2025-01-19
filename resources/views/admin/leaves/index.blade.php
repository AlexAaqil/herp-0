<x-authenticated-layout class="Leaves">
    <x-admin-header header_title="Leaves" :total_count="count($leaves)" route="{{ route('leaves.create') }}" />

    <div class="body">
        @if (count($leaves) > 0)
            <div class="table">
                <table>
                    <thead>
                        @can('view-as-admin')
                        <th>User</th>
                        @endcan
                        <th>Category</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Reason</th>
                        <th class="actions"></th>
                    </thead>
    
                    <tbody>
                        @foreach ($leaves as $leave)
                            <tr class="searchable">                            
                                @can('view-as-admin')
                                    <td>{{ $leave->user->full_name }}</td>
                                @endcan
                                <td>{{ ucfirst($leave->category) }}</td>
                                <td>{{ $leave->from_date->format('d-m-Y') . ' to ' . $leave->to_date->format('d-m-Y') }}</td>
                                <td class="{{ $leave->status == 'approved' ? 'success' : 'danger' }}">{{ ucfirst($leave->status) }}</td>
                                <td>{!! Illuminate\Support\Str::limit($leave->reason, 30, ' ...') !!}</td>
                                <td class="actions">
                                    <div class="action">
                                        <a href="{{ route('leaves.edit', $leave->id) }}">
                                            <span class="fas fa-eye"></span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>You've not applied for any leaves yet.</p>
        @endif
    </div>
</x-authenticated-layout>
