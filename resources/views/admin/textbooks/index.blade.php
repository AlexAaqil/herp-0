<x-authenticated-layout class="Textbooks">
    <x-admin-header header_title="Textbooks" :total_count="count($textbooks)" route="{{ route('textbooks.create') }}" />

    <div class="body">
        @if (count($textbooks) > 0)
            <table class="table">
                <thead>
                    <th class="center">ID</th>
                    <th>Book Number</th>
                    <th>Book Name</th>
                    <th>Reg. No.</th>
                    <th>Student</th>
                    @can('view-author-column')
                        <th>Author</th>
                    @endcan
                    <th>Status</th>
                    <th>Date Issued</th>
                    <th>Date Returned</th>
                </thead>

                <tbody>
                    @php $id = 1 @endphp
                    @foreach ($textbooks as $textbook)
                        <tr class="searchable">
                            <td class="center">
                                <a href="{{ route('textbooks.edit', ['textbook' => $textbook->id]) }}">
                                    {{ $id++ }}
                                </a>
                            </td>
                            <td>{{ $textbook->book_number }}</td>
                            <td>{{ $textbook->book_name }}</td>
                            <td>{{ $textbook->student->registration_number }}</td>
                            <td>{{ $textbook->student->first_name . ' ' . $textbook->student->last_name }}</td>
                            @can('view-author-column')
                                <td>{{ $textbook->createdBy->first_name . ' ' . $textbook->createdBy->last_name }}</td>
                            @endcan
                            <td>{{ ucfirst($textbook->status) }}</td>
                            <td>{{ $textbook->date_issued }}</td>
                            <td>{{ $textbook->date_returned == null ? 'Not returned' : $textbook->date_returned }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No textbooks have been added.</p>
        @endif
    </div>
</x-authenticated-layout>
