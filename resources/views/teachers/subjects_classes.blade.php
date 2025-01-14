<x-authenticated-layout class="Users">
    <x-admin-header header_title="Subjects" :total_count="count($subjects)" />

    <div class="body">
        <table class="table">
            <thead>
                <th class="center">ID</th>
                <th>Subject</th>
                <th>Class</th>
            </thead>

            <tbody>
                @if (count($subjects) > 0)
                    @php $id = 1 @endphp
                    @foreach ($subjects as $subject)
                        <tr class="searchable">
                            <td class="center">{{ $id++ }}</td>
                            <td>{{ $subject->subject_name ?? 'N/A' }}</td>
                            <td>{{ $subject->class_name ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">No subjects have been allocated to you.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-authenticated-layout>
