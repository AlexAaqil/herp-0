<x-authenticated-layout class="Disciplinaries">
    <x-admin-header header_title="Disciplinaries" :total_count="count($disciplinaries)" route="{{ route('disciplinaries.create') }}" />

    <div class="body">
        @if (count($disciplinaries) > 0)
        <div class="table">
            <table>
                <thead>
                    <th>Reg. No.</th>
                    <th>Student</th>
                    @can('view-as-admin')
                    <th>Author</th>
                    @endcan
                    <th>Category</th>
                    <th>Comment</th>
                    <th class="actions"></th>
                </thead>

                <tbody>
                    @foreach ($disciplinaries as $disciplinary)
                        <tr class="searchable">
                            <td>{{ $disciplinary->student->registration_number }}</td>
                            <td>{{ $disciplinary->student->first_name . ' ' . $disciplinary->student->last_name }}</td>
                            @can('view-as-admin')
                                <td>{{ $disciplinary->createdBy->first_name . ' ' . $disciplinary->createdBy->last_name }}
                                </td>
                            @endcan
                            <td>{{ $disciplinary->category }}</td>
                            <td>{!! Illuminate\Support\Str::limit($disciplinary->comment, 35, ' ...') !!}</td>
                            <td class="actions">
                                <div class="action">
                                    <a href="{{ route('disciplinaries.edit', ['disciplinary' => $disciplinary->id]) }}">
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
            <p>No disciplinaries have been added.</p>
        @endif
    </div>
</x-authenticated-layout>
