<x-authenticated-layout class="Payments">
    <div class="custom_form">
        <header>
            <p>New Payment</p>
        </header>

        <form action="{{ route('payments.store') }}" method="post">
            @csrf

            <div class="row_input_group">
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
            </div>

            <div class="row_input_group">
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
            </div>

            <div class="row_input_group">
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
            </div>

            <button type="submit">Save</button>
        </form>
    </div>
</x-authenticated-layout>
