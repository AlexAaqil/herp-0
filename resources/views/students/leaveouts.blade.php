<x-app-layout>
    <main class="app_main StudentPortal">
        @include('partials.student_aside')

        <div class="app_content">
            <h2>Leaveouts</h2>

            @if ($leaveouts->isEmpty())
                <p>No leaveouts yet.</p>
            @else
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Period</th>
                                <th>Category</th>
                                <th>Reason</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leaveouts as $leaveout)
                                <tr>
                                    <td>{{ $leaveout->from_date . ' to ' . $leaveout->to_date }}</td>
                                    <td>{{ ucfirst($leaveout->category) }}</td>
                                    <td>{!! Illuminate\Support\Str::limit($leaveout->reason, 50, ' ...') !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </main>
</x-app-layout>
