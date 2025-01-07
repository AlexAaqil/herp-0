<x-authenticated-layout class="Disciplinaries">
    <x-admin-header header_title="Disciplinaries" :total_count="count($disciplinaries)" route="{{ route('disciplinaries.create') }}" />

    <div class="body">
        @if (count($disciplinaries) > 0)
            <table class="table">
                <thead>
                    <th class="center">ID</th>
                    <th>Reg. No.</th>
                    <th>Student</th>
                    @can('view-as-admin')
                        <th>Author</th>
                    @endcan
                    <th>Category</th>
                    <th>Comment</th>
                </thead>

                <tbody>
                    @php $id = 1 @endphp
                    @foreach ($disciplinaries as $disciplinary)
                        <tr class="searchable">
                            <td class="center">
                                <a href="{{ route('disciplinaries.edit', ['disciplinary' => $disciplinary->id]) }}">
                                    {{ $id++ }}
                                </a>
                            </td>
                            <td>{{ $disciplinary->student->registration_number }}</td>
                            <td>{{ $disciplinary->student->first_name . ' ' . $disciplinary->student->last_name }}</td>
                            @can('view-as-admin')
                                <td>{{ $disciplinary->createdBy->first_name . ' ' . $disciplinary->createdBy->last_name }}
                                </td>
                            @endcan
                            <td>{{ $disciplinary->category }}</td>
                            <td>{!! Illuminate\Support\Str::limit($disciplinary->comment, 35, ' ...') !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No disciplinaries have been added.</p>
        @endif
    </div>
</x-authenticated-layout>
