<x-authenticated-layout class="PaymentRecords">
    <div class="filter_form">
        <form action="{{ route('payment-records.index') }}" method="get">
            <select name="class_section_id" id="class_section_id" onchange="this.form.submit()">
                <option value="">Select Class Section</option>
                @foreach ($class_sections as $class_section)
                    <option value="{{ $class_section->id }}"
                        {{ request('class_section_id') == $class_section->id ? 'selected' : '' }}>
                        {{ $class_section->title }}
                    </option>
                @endforeach
            </select>
        </form>
    </div>

    <div class="body mt-10">
        <p class="title">
            {{ request('class_section_id') ? 'Students in Selected Class Section' : 'All Students' }}
        </p>

        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Class</th>
                        <th>Parent</th>
                        <th>Action</th>
                    </tr>
                </thead>
    
                <tbody>
                    @forelse ($students as $student)
                        <tr>
                            <td>{{ $student->registration_number . ' - ' .$student->first_name . ' ' . $student->last_name }}</td>
                            <td>{{ $student->studentClassSection->title }}</td>
                            <td>
                                @forelse ($student->parents as $parent)
                                    <span>{{ $parent->first_name.' '.$parent->last_name.' - '.$parent->phone_main }}</span>
                                    <br>
                                @empty
                                    <span>Unknown</span>
                                @endforelse
                            </td>
                            <td>
                                <a href="{{ route('payment-records.create', $student->id) }}">Manage Payments</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No students found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-authenticated-layout>
