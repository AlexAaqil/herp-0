<x-app-layout>
    <main class="app_main StudentPortal">
        @include('partials.student_aside')

        <div class="app_content">
            <h2>Textbooks</h2>

            @if($textbooks->isEmpty())
                <p>No textbooks assigned yet.</p>
            @else
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Book Number</th>
                                <th>Book Name</th>
                                <th>Status</th>
                                <th>Issued On</th>
                                <th>Returned On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($textbooks as $textbook)
                                <tr>
                                    <td>{{ $textbook->book_number }}</td>
                                    <td>{{ $textbook->book_name }}</td>
                                    <td>{{ ucfirst($textbook->status) }}</td>
                                    <td>{{ $textbook->date_issued }}</td>
                                    <td>{{ $textbook->date_returned ?? 'Not yet returned' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </main>
</x-app-layout>
