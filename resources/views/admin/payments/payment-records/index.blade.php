<x-authenticated-layout class="PaymentRecords">

    <div class="custom_form">
        <form action="{{ route('payment-records.index') }}" method="get">
            <div class="row_input_group">
                <div class="input_group">
                    <label for="class_section_id">Class Section</label>
                    <select name="class_section_id" id="class_section_id" onchange="this.form.submit()">
                        <option value="">Select Class Section</option>
                        @foreach ($class_sections as $class_section)
                            <option value="{{ $class_section->id }}"
                                {{ request('class_section_id') == $class_section->id ? 'selected' : '' }}>
                                {{ $class_section->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
    </div>

    <div class="body mt-10">
        <p class="title">
            {{ request('class_section_id') ? 'Students in Selected Class Section' : 'All Students' }}
        </p>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Parent</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($students as $student)
                    <tr>
                        <td>{{ $student->registration_number }}</td>
                        <td>{{ $student->first_name . ' ' . $student->last_name }}</td>
                        <td>{{ $student->studentClassSection->title }}</td>
                        <td>{{ $student->parent_names }}</td>
                        <td>
                            <a
                                href="{{ route('payment-records.create', $student->id) }}">Manage
                                Payments</a>
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
</x-authenticated-layout>



{{-- <x-authenticated-layout class="PaymentRecords">
    <x-admin-header header_title="Payment Records" :total_count="count($payment_records)" route="{{ route('payment-records.create') }}" />

    <div class="body">
        @if (count($payment_records) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th class="center">ID</th>
                        <th>Student</th>
                    </tr>
                </thead>

                <tbody>
                    @php $id = 1 @endphp
                    @foreach ($payment_records as $payment)
                        <tr class="searchable">
                            <td class="center">
                                <a href="#">
                                    {{ $id++ }}
                                </a>
                            </td>
                            <td>{{ $payment->student->registration_number . ' - ' . $payment->student->first_name . ' ' . $payment->student->last_name }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No payment records have been added yet.</p>
        @endif
    </div>
</x-authenticated-layout> --}}
