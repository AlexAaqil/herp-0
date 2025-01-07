<x-authenticated-layout class="Payments">
    <div class="custom_form">
        <div class="system_nav">
            <a href="{{ route('settings.index') }}">Settings</a>
            <a href="{{ route('payments.index') }}">/ Payments</a>
            <span>/ Edit</span>
        </div>

        <header>
            <p>Update Payment</p>
        </header>

        <form action="{{ route('payments.update', $payment->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="info_wrapper">
                <p class="title">Payment Details</p>
                <div class="info">
                    <p>
                        <span>Ref No.</span>
                        <span>{{ $payment->reference_number }}</span>
                    </p>
                    <p>
                        <span>Class</span>
                        <span>{{ $payment->myClass->class_name }}</span>
                    </p>
                    <p>
                        <span>Payment Method</span>
                        <span>{{ $payment->payment_method }}</span>
                    </p>
                    <p>
                        <span>Period</span>
                        <span>{{ $payment->year . ' Term - ' . $payment->term }}</span>
                    </p>
                </div>
            </div>

            <div class="row_input_group">
                <div class="input_group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" placeholder="E.g School Fees"
                        value="{{ old('title', $payment->title) }}">
                    <span class="inline_alert">{{ $errors->first('title') }}</span>
                </div>

                <div class="input_group">
                    <label for="amount">Amount</label>
                    <input type="number" name="amount" id="amount" value="{{ old('amount', $payment->amount) }}">
                    <span class="inline_alert">{{ $errors->first('amount') }}</span>
                </div>
            </div>

            <div class="buttons">
                <button type="submit">Update</button>

                <button type="button" class="btn_danger" onclick="deleteItem({{ $payment->id }}, 'payment');"
                    form="deleteForm_{{ $payment->id }}">
                    <i class="fas fa-trash-alt delete"></i>
                    <span>Delete</span>
                </button>
            </div>
        </form>

        <form id="deleteForm_{{ $payment->id }}" action="{{ route('payments.destroy', $payment->id) }}"
            method="post" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>

    <x-slot name="javascript">
        <x-sweetalert />
    </x-slot>
</x-authenticated-layout>
