<x-app-layout>
    <main class="app_main StudentPortal">
        @include('partials.student_aside')

        <div class="app_content">
            <h2>Performance</h2>

            @if ($results->isEmpty())
                <p>No marks have been added yet.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Period</th>
                            <th>Title</th>
                            <th>Subject</th>
                            <th>Marks</th>
                            <th>Grade</th>
                            {{-- <th class="center">Action</th> --}}
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($results as $record)
                            <tr>
                                <td>{{ $record->exam->year . ' - Term ' . $record->exam->term }}</td>
                                <td>{{ $record->exam->title }}</td>
                                <td>{{ $record->subject->title }}</td>
                                <td>{{ $record->marks }}</td>
                                <td>{{ $record->grade }}</td>
                                {{-- <td class="center">
                                    <a href="{{ route('receipts.print', $record->id) }}" target="_blank"
                                        class="btn_link">Print</a>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </main>
</x-app-layout>
