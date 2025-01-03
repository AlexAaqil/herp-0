<x-authenticated-layout class="Users">
    <x-admin-header header_title="Students" :total_count="count($students)" route="{{ route('students.create') }}" />

    <div class="body">
        @if (count($students) > 0)
            <table class="table">
                <thead>
                    <th class="center">ID</th>
                    <th>Reg No.</th>
                    <th>Name</th>
                    <th>Class</th>
                </thead>

                <tbody>
                    @php $id = 1 @endphp
                    @foreach ($students as $student)
                        <tr class="searchable">
                            <td class="center">
                                <a href="{{ route('students.edit', ['student' => $student->id]) }}">
                                    {{ $id++ }}
                                </a>
                            </td>
                            <td>{{ $student->registration_number }}</td>
                            <td>{{ $student->first_name . ' ' . Auth::user()->last_name }}</td>
                            <td>{{ $student->studentClassSection->title }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No students have been added.</p>
        @endif
    </div>
</x-authenticated-layout>
