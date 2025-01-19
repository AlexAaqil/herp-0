<x-authenticated-layout class="Expenses">
    <x-admin-header header_title="Expenses" :total_count="count($expenses)" />

    <div class="row_container">
        <div class="body">
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>Recepient</th>
                            <th>Category</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th class="actions"></th>
                        </tr>
                    </thead>
    
                    <tbody>
                        @if (count($expenses) > 0)
                            @foreach ($expenses as $expense)
                                <tr class="searchable">
                                    <td>{{ $expense->recepient }}</td>
                                    <td>{{ ucfirst($expense->category) }}</td>
                                    <td>{{ number_format($expense->amount_paid, 2) }}</td>
                                    <td>{{ $expense->date->format('d-m-Y') }}</td>
                                    <td>{!! Illuminate\Support\Str::limit($expense->description, 25, '...') ?? 'Not described' !!}</td>
                                    <td class="actions">
                                        <div class="action">
                                            <a href="{{ route('expenses.edit', $expense->id) }}">
                                                <span class="fas fa-eye"></span>
                                            </a>
                                        </div>
    
                                        <div class="action">
                                            <a href="{{ route('expense-receipt.print', $expense->id) }}" target="_blank">
                                                <span class="fas fa-print"></span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">No expenses have been added yet</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        @can('view-as-accountant')
        <div class="custom_form">
            <header>
                <p>New Expense</p>
            </header>

            <form action="{{ route('expenses.store') }}" method="post">
                @csrf

                <div class="input_group">
                    <label for="recepient" class="required">Recepient</label>
                    <input type="text" name="recepient" id="recepient" value="{{ old('recepient') }}">
                    <span class="inline_alert">{{ $errors->first('recepient') }}</span>
                </div>

                <div class="input_group">
                    <label for="category" class="required">Category</label>
                    <select name="category" id="category">
                        <option value="">Select Category</option>
                        @foreach(App\Models\Expense::EXPENSECATEGORIES as $category)
                            <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>{{ ucfirst($category) }}</option>
                        @endforeach
                    </select>
                    <span class="inline_alert">{{ $errors->first('category') }}</span>
                </div>

                <div class="input_group">
                    <label for="amount_paid" class="required">Amount Paid</label>
                    <input type="number" name="amount_paid" id="amount_paid" value="{{ old('amount_paid') }}">
                    <span class="inline_alert">{{ $errors->first('amount_paid') }}</span>
                </div>

                <div class="input_Group">
                    <label for="date" class="required">Date</label>
                    <input type="date" name="date" id="date" value="{{ old('date') }}">
                    <span class="inline_alert">{{ $errors->first('date') }}</span>
                </div>

                <div class="input_group">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" value="{{ old('description') }}">
                    <span class="inline_alert">{{ $errors->first('description') }}</span>
                </div>

                <button type="submit">Save</button>
            </form>
        </div>
        @endcan
    </div>

</x-authenticated-layout>
