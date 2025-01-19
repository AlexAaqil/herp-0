<x-authenticated-layout class="Textbooks">
    <x-admin-header header_title="Textbooks" :total_count="count($textbooks)" route="{{ route('textbooks.create') }}" />

    <div class="body">
        @if (count($textbooks) > 0)
            <div class="table">
                <table>
                    <thead>
                        <th>Book Number</th>
                        <th>Book Name</th>
                        <th>Reg. No.</th>
                        <th>Student</th>
                        @can('view-as-admin')
                            <th>Author</th>
                        @endcan
                        <th>Status</th>
                        <th>Date Issued</th>
                        <th>Date Returned</th>
                        <th class="actions">ID</th>
                    </thead>
    
                    <tbody>
                        @foreach ($textbooks as $textbook)
                            <tr class="searchable">
                                <td>{{ $textbook->book_number }}</td>
                                <td>{{ $textbook->book_name }}</td>
                                <td>{{ $textbook->student->registration_number }}</td>
                                <td>{{ $textbook->student->first_name . ' ' . $textbook->student->last_name }}</td>
                                @can('view-as-admin')
                                    <td>{{ $textbook->issuedBy->first_name . ' ' . $textbook->issuedBy->last_name }}</td>
                                @endcan
                                <td>{{ ucfirst($textbook->status) }}</td>
                                <td>{{ $textbook->date_issued }}</td>
                                <td>{{ $textbook->date_returned == null ? 'Not returned' : $textbook->date_returned }}</td>
                                <td class="actions">
                                    <div class="action">
                                        <a href="{{ route('textbooks.edit', ['textbook' => $textbook->id]) }}">
                                            <span class="fas fa-eye"></span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>No textbooks have been added.</p>
        @endif
    </div>
</x-authenticated-layout>
