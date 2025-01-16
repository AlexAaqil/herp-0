<x-authenticated-layout class="Payments">
    <div class="system_nav">
        <a href="{{ route('payment-records.create', $student->id) }}">Payment Records</a>
        <span>/ Select Term and Year</span>
    </div>

    <div class="body">
        <p class="title">
            {{ $student->registration_number . ' - ' . $student->first_name . ' ' . $student->last_name }}
        </p>

        <form action="{{ route('payment-gatepass.generate', $student->id) }}" method="POST" class="form">
            @csrf
            <div class="input_group">
                <label for="year">Year</label>
                <input type="number" name="year" id="year" value="{{ old('year', now()->year) }}" min="2000" max="{{ now()->year }}">
                @error('year')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="input_group">
                <label for="term">Term</label>
                <select name="term" id="term">
                    <option value="1" {{ old('term') == 1 ? 'selected' : '' }}>Term 1</option>
                    <option value="2" {{ old('term') == 2 ? 'selected' : '' }}>Term 2</option>
                    <option value="3" {{ old('term') == 3 ? 'selected' : '' }}>Term 3</option>
                </select>
                @error('term')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn_info">Generate Gate Pass</button>
        </form>
    </div>
</x-authenticated-layout>