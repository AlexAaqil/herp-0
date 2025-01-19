<x-authenticated-layout class="Leaveouts">
    <x-admin-header header_title="Student Leaveouts" :total_count="count($leaveouts)" route="{{ route('leaveouts.create') }}" />

    <div class="body">
        @if (count($leaveouts) > 0)
        <div class="table">
            <table>
                <thead>
                    <th>Student</th>
                    @can('view-as-admin')
                    <th>Author</th>
                    @endcan
                    <th>Category</th>
                    <th>Date</th>
                    <th>Reason</th>
                    <th class="actions"></th>
                </thead>

                <tbody>
                    @foreach ($leaveouts as $leaveout)
                        <tr class="searchable">
                            <td>{{ $leaveout->student->registration_number . ' - ' . $leaveout->student->first_name . ' ' . $leaveout->student->last_name }}</td>
                            @can('view-as-admin')
                                <td>{{ $leaveout->createdBy->first_name . ' ' . $leaveout->createdBy->last_name }}</td>
                            @endcan
                            <td>{{ ucfirst($leaveout->category) }}</td>
                            <td>{{ $leaveout->from_date . ' to ' . $leaveout->to_date }}</td>
                            <td>{!! Illuminate\Support\Str::limit($leaveout->reason, 30, ' ...') !!}</td>
                            <td class="actions">
                                <div class="action">
                                    <a href="{{ route('leaveouts.edit', ['leaveout' => $leaveout->id]) }}">
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
            <p>No leaveouts have been added.</p>
        @endif
    </div>
</x-authenticated-layout>
