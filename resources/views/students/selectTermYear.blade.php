<x-app-layout>
    <main class="app_main StudentPortal">
        @include('partials.student_aside')

        <div class="app_content">
            <h2>Fees Receipt</h2>
            <div class="system_nav">
                <span>Select Term and Year</span>
            </div>

            <div class="body">
                <form action="{{ route('student-receipt.generate', $student->id) }}" method="POST" class="form">
                    @csrf
                    <div class="input_group">
                        <label for="year">Year</label>
                        <input type="number" name="year" id="year" value="{{ old('year', now()->year) }}"
                            min="2000" max="{{ now()->year }}">
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

                    <button type="submit" class="btn_info">Generate Receipt</button>
                </form>
            </div>
        </div>
    </main>
</x-app-layout>
