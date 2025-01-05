<x-authenticated-layout class="Exams">
    <div class="system_nav">
        <a href="{{ route('settings.index') }}">Settings</a>
        <span>/ Exams</span>
    </div>

    <x-admin-header header_title="Exams" :total_count="count($exams)" />

    <div class="row_container">
        <div class="body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Exam</th>
                        <th>Period</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($exams) > 0)
                        @foreach ($exams as $exam)
                            <tr class="searchable">
                                <td>
                                    <a href="{{ route('exams.edit', $exam->id) }}">{{ $exam->title }}</a>
                                </td>
                                <td>{{ $exam->year . ' Term - ' . $exam->term }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No exams have been added yet</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="custom_form">
            <header>
                <p>New Exam</p>
            </header>

            <form action="{{ route('exams.store') }}" method="post">
                @csrf

                <div class="input_group">
                    <label for="title">Exam</label>
                    <input type="text" name="title" id="title"
                        value="{{ old('title') }}">
                    <span class="inline_alert">{{ $errors->first('title') }}</span>
                </div>

                <div class="input_group">
                    <label for="year">Year</label>
                    <input type="number" name="year" id="year" value="{{ old('year') }}">
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
