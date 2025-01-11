<x-authenticated-layout class="Users">
    <x-admin-header header_title="Students" :total_count="count($students)" :route="auth()->user()->can('view-as-admin') ? route('students.create') : null" />

    <div class="body">
        @if (count($students) > 0)
            <table class="table">
                <thead>
                    <th class="center">ID</th>
                    <th>Image</th>
                    <th>Student</th>
                    <th>Class</th>
                    <th>Parents</th>
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
                            <td>
                                <img src="{{ $student->image ? asset('storage/'.$student->image) : asset('assets/images/default_profile.jpg') }}" alt="Student Image" style="max-width: 25px;">
                            </td>
                            <td>{{ $student->registration_number . ' - ' . $student->first_name . ' ' . $student->last_name }}
                            </td>
                            <td>{{ $student->studentClassSection->title }}</td>
                            <td>
                                @forelse ($student->parents as $parent)
                                    <span>{{ $parent->first_name.' '.$parent->last_name.' - '.$parent->phone_main }}</span>
                                    <br>
                                @empty
                                    <span>N/A</span>
                                @endforelse
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No students have been added.</p>
        @endif
    </div>
</x-authenticated-layout>
