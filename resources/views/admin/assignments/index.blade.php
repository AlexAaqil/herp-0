<x-authenticated-layout class="Assignments">
    <x-admin-header header_title="Assignments" :total_count="count($assignments)" route="{{ route('assignments.create') }}" />

    <div class="body">
        @if (count($assignments) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Class</th>
                        <th>Duration</th>
                        <th>Description</th>
                        <th class="actions">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($assignments as $assignment)
                    <tr>
                        <td>{{ $assignment->subject->title }}</td>
                        <td>{{ $assignment->classSection->title }}</td>
                        <td>{{ $assignment->date_issued.' to '. $assignment->deadline }}</td>
                        <td>{!! Illuminate\Support\Str::limit($assignment->description, 35, ' ...') !!}</td>
                        <td class="actions">
                            <div class="action">
                                <a href="{{ Storage::url($assignment->uploaded_assignment) }}" target="_blank" title="Download" download>
                                    <span class="fas fa-download"></span>
                                </a>
                            </div>
                            <div class="action">
                                <a href="#" title="View details">
                                    <span class="fas fa-eye"></span>
                                </a>
                            </div>
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
