<x-app-layout>
    <main class="app_main StudentPortal">
        @include('partials.student_aside')

        <div class="app_content">
            <h2>Disciplinaries</h2>

            @if ($disciplinaries->isEmpty())
                <p>No disciplinaries yet.</p>
            @else
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Category</th>
                                <th>Reason</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($disciplinaries as $disciplinary)
                                <tr>
                                    <td>{{ $disciplinary->created_at->format('d F Y') }}</td>
                                    <td>{{ ucfirst($disciplinary->category) }}</td>
                                    <td>{!! Illuminate\Support\Str::limit($disciplinary->comment, 50, ' ...') !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </main>
</x-app-layout>
