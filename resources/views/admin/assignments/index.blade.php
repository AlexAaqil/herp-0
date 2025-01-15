<x-authenticated-layout class="Assignments">
    <x-admin-header header_title="Assignments" :total_count="count($assignments)" route="{{ route('assignments.create') }}" />

    <div class="body">
        @if (count($assignments) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Class</th>
                        <th>Subject</th>
                        <th>Duration</th>
                        <th>Description</th>
                        <th>File</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($assignments as $assignment)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $assignment->classSection->title }}</td>
                        <td>{{ $assignment->subject->title }}</td>
                        <td>{{ $assignment->date_issued.' - '. $assignment->deadline }}</td>
                        <td>{!! Illuminate\Support\Str::limit($assignment->description, 35, ' ...') !!}</td>
                        <td>
                            <a href="{{ Storage::url($assignment->uploaded_assignment) }}" target="_blank" download>Download</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No assignments have been added.</p>
        @endif
    </div>
</x-authenticated-layout>
