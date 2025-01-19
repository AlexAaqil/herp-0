<x-authenticated-layout class="Payments">
    <div class="system_nav">
        <a href="{{ route('settings.index') }}">Settings</a>
        <span>Payments</span>
    </div>

    <x-admin-header header_title="Payments" :total_count="count($payments)" />

    <div class="row_container">
        <div class="body">
            @if (count($payments) > 0)
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Class</th>
                                <th>Period</th>
                                <th>Title</th>
                                <th>Payment</th>
                                <th>Amount</th>
                                <th class="actions"></th>
                            </tr>
                        </thead>
            
                        <tbody>
                            @php $id = 1 @endphp
                            @foreach ($payments as $payment)
                                <tr class="searchable">
                                    <td>{{ $payment->myClass->class_name }}</td>
                                    <td>{{ $payment->year.' - Term '.$payment->term }}</td>
                                    <td>{{ $payment->title }}</td>
                                    <td>{{ $payment->payment_method }}</td>
                                    <td>{{ $payment->amount }}</td>
                                    <td class="actions">
                                        <div class="action">
                                            <a href="{{ route('payments.edit', $payment->id) }}">
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
                <p>No payments have been added yet</p>
            @endif
        </div>

        <div class="custom_form">
            <header>
                <p>New Payment</p>
            </header>
    
            <form action="{{ route('payments.store') }}" method="post">
                @csrf
    
                <div class="input_group">
                    <label for="class_id">Class</label>
                    <select name="class_id" id="class_id">
                        <option value="">Select Class</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                        @endforeach
                    </select>
                    <span class="inline_alert">{{ $errors->first('class_id') }}</span>
                </div>

                <div class="input_group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" placeholder="E.g School Fees"
                        value="{{ old('title') }}">
                    <span class="inline_alert">{{ $errors->first('title') }}</span>
                </div>
    
                <div class="input_group">
                    <label for="payment_method">Payment Method</label>
                    <select name="payment_method" id="payment_method">
                        <option value="">Select Payment Method</option>
                        <option value="cheque">Cheque</option>
                        <option value="cash">Cash</option>
                    </select>
                    <span class="inline_alert">{{ $errors->first('payment_method') }}</span>
                </div>

                <div class="input_group">
                    <label for="amount">Amount</label>
                    <input type="number" name="amount" id="amount" value="{{ old('amount') }}">
                    <span class="inline_alert">{{ $errors->first('amount') }}</span>
                </div>
    
                <div class="input_group">
                    <label for="year">Year</label>
                    <input type="text" name="year" id="year" value="{{ old('year') }}">
                    <span class="inline_alert">{{ $errors->first('year') }}</span>
                </div>

                <div class="input_group">
                    <label for="term">Term</label>
                    <select name="term" id="term">
                        <option value="">Select Term</option>
                        <option value="1">Term 1</option>
                        <option value="2">Term 2</option>
                        <option value="3">Term 3</option>
                    </select>
                    <span class="inline_alert">{{ $errors->first('term') }}</span>
                </div>
    
                <button type="submit">Save</button>
            </form>
        </div>
    </div>
</x-authenticated-layout>
