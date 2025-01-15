<x-app-layout>
    <main class="app_main StudentPortal">
        @include('partials.student_aside')

        <div class="app_content">
            <x-admin-header header_title="Assignments" :total_count="count($assignments)" />

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
                        <tr class="searchable">
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
    </main>
    
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</x-app-layout>
