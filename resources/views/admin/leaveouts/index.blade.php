<x-authenticated-layout class="Leaveouts">
    <x-admin-header header_title="Student Leaveouts" :total_count="count($leaveouts)" route="{{ route('leaveouts.create') }}" />

    <div class="body">
        @if (count($leaveouts) > 0)
            <table class="table">
                <thead>
                    <th class="center">ID</th>
                    <th>Reg. No.</th>
                    <th>Student</th>
                    @can('view-as-admin')
                        <th>Author</th>
                    @endcan
                    <th>Category</th>
                    <th>Date</th>
                    <th>Reason</th>
                </thead>

                <tbody>
                    @php $id = 1 @endphp
                    @foreach ($leaveouts as $leaveout)
                        <tr class="searchable">
                            <td class="center">
                                <a href="{{ route('leaveouts.edit', ['leaveout' => $leaveout->id]) }}">
                                    {{ $id++ }}
                                </a>
                            </td>
                            <td>{{ $leaveout->student->registration_number }}</td>
                            <td>{{ $leaveout->student->first_name . ' ' . $leaveout->student->last_name }}</td>
                            @can('view-as-admin')
                                <td>{{ $leaveout->createdBy->first_name . ' ' . $leaveout->createdBy->last_name }}</td>
                            @endcan
                            <td>{{ ucfirst($leaveout->category) }}</td>
                            <td>{{ $leaveout->from_date . ' to ' . $leaveout->to_date }}</td>
                            <td>{!! Illuminate\Support\Str::limit($leaveout->reason, 30, ' ...') !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No leaveouts have been added.</p>
        @endif
    </div>
</x-authenticated-layout>
