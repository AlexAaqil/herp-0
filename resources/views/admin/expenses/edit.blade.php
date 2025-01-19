<x-authenticated-layout class="Expenses">
    <div class="custom_form">
        <header>
            <p>Update Expense</p>

            <div class="system_nav">
                <a href="{{ route('expenses.index') }}">Expenses</a>
                <span>Edit</span>
            </div>
        </header>

        <form action="{{ route('expenses.update', $expense->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="input_group">
                <label for="recepient" class="required">Recepient</label>
                <input type="text" name="recepient" id="recepient" value="{{ old('recepient', $expense->recepient) }}">
                <span class="inline_alert">{{ $errors->first('recepient') }}</span>
            </div>

            <div class="input_group">
                <label for="category" class="required">Category</label>
                <select name="category" id="category">
                    <option value="">Select Category</option>
                    @foreach(App\Models\Expense::EXPENSECATEGORIES as $category)
                        <option value="{{ $category }}" {{ old('category', $expense->category) == $category ? 'selected' : '' }}>{{ ucfirst($category) }}</option>
                    @endforeach
                </select>
                <span class="inline_alert">{{ $errors->first('category') }}</span>
            </div>

            <div class="input_group">
                <label for="amount_paid" class="required">Amount Paid</label>
                <input type="number" name="amount_paid" id="amount_paid" value="{{ old('amount_paid', $expense->amount_paid) }}">
                <span class="inline_alert">{{ $errors->first('amount_paid') }}</span>
            </div>

            <div class="input_Group">
                <label for="date" class="required">Date</label>
                <input type="date" name="date" id="date" value="{{ old('date', $expense->date) }}">
                <span class="inline_alert">{{ $errors->first('date') }}</span>
            </div>

            <div class="input_group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" value="{{ old('description', $expense->description) }}">
                <span class="inline_alert">{{ $errors->first('description') }}</span>
            </div>

            @can('view-as-accountant')
            <div class="buttons">
                <button type="submit">Update</button>

                <button type="button" class="btn_danger" onclick="deleteItem({{ $expense->id }}, 'expense');"
                    form="deleteForm_{{ $expense->id }}">
                    <i class="fas fa-trash-alt delete"></i>
                    <span>Delete</span>
                </button>
            </div>
        </form>

        <form id="deleteForm_{{ $expense->id }}" action="{{ route('expenses.destroy', $expense->id) }}" method="post"
            style="display: none;">
            @csrf
            @method('DELETE')
        </form>
        @endcan
    </div>

    <x-slot name="javascript">
        <x-sweetalert />
    </x-slot>
</x-authenticated-layout>
