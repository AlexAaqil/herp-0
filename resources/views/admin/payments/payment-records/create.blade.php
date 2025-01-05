<x-authenticated-layout class="PaymentRecords">
    <div class="body">
        @if ($paymentRecords->isNotEmpty())
            <p class="title">
                Manage Payments:
            </p>
            <p>
                {{ $paymentRecords->first()->student ? $paymentRecords->first()->student->first_name.' '.$paymentRecords->first()->student->last_name.' - '.$paymentRecords->first()->student->registration_number : 'No available payments' }}
            </p>
        @else
            <p class="title">No payment records available for this student.</p>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Period</th>
                    <th>Ref No.</th>
                    <th>Amount</th>
                    <th>Paid</th>
                    <th>Balance</th>
                    <th>Pay Now</th>
                    <th class="center">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($paymentRecords as $record)
                    <tr>
                        <td>{{ $record->payment->title }}</td>
                        <td>{{ $record->payment->year.' - Term '.$record->payment->term }}</td>
                        <td>{{ $record->reference_number }}</td>
                        <td>{{ $record->payment->amount }}</td>
                        <td class="info">{{ $record->amount_paid }}</td>
                        <td class="{{ $record->balance == 0 ? 'success' : 'danger' }}">{{ $record->balance }}</td>
                        <td>
                            <form action="{{ route('payment-records.store') }}" method="POST" class="inline">
                                @csrf
                                <input type="hidden" name="student_id" value="{{ $student_id }}">
                            
                                <input type="number" name="amount_paid[{{ $record->id }}]" value="{{ old('amount_paid.'.$record->id, '') }}" min="0" step="0.01">
                                @if ($errors->has("amount_paid.{$record->id}"))
                                    <span class="error">{{ $errors->first("amount_paid.{$record->id}") }}</span>
                                @endif
                                
                                <button type="submit" class="btn_info">Pay</button>
                            </form>
                        </td>
                        <td>
                            <div class="actions">
                                <div class="action">
                                    <a href="{{ route('receipts.print', $record->id) }}" target="_blank" class="btn_link">Print</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-authenticated-layout>



{{-- <x-authenticated-layout class="PaymentRecords">

    <div class="custom_form">
        <form action="{{ route('payment-records.create') }}" method="get">
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
    
                <div class="input_group">
                    <label for="year">Year</label>
                    <select name="year" id="year" onchange="this.form.submit()">
                        <option value="">Select Year</option>
                        @foreach (range(date('Y') - 5, date('Y')) as $yr)
                            <option value="{{ $yr }}" {{ request('year') == $yr ? 'selected' : '' }}>{{ $yr }}</option>
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
                        <td>{{ $student->first_name.' '.$student->last_name }}</td>
                        <td>{{ $student->studentClassSection->title }}</td>
                        <td>{{ $student->parent_names }}</td>
                        <td>
                            <a href="{{ route('payment-records.manage', ['student_id' => $student->id, 'year' => request('year')]) }}">Manage Payments</a>
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
</x-authenticated-layout> --}}
