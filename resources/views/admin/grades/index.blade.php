<x-authenticated-layout class="Grades">
    <div class="system_nav">
        <a href="{{ route('settings.index') }}">Settings</a>
        <span>/ Grades</span>
    </div>

    <x-admin-header header_title="Grades" :total_count="count($grades)" />

    <div class="row_container">
        <div class="body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Grade</th>
                        <th>Marks</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
    
                <tbody>
                    @if (count($grades) > 0)
                        @foreach ($grades as $grade)
                            <tr class="searchable">
                                <td>
                                    <a href="{{ route('grades.edit', $grade->id) }}">{{ $grade->grade }}</a>
                                </td>
                                <td>{{ $grade->min_marks.' - '.$grade->max_marks }}</td>
                                <td>{{ $grade->remarks }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No grades have been added yet</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="custom_form">
            <header>
                <p>New Grading</p>
            </header>
    
            <form action="{{ route('grades.store') }}" method="post">
                @csrf

                <div class="input_group">
                    <label for="grade">Grade</label>
                    <input type="text" name="grade" id="grade" placeholder="A, B, C, D..."
                        value="{{ old('grade') }}">
                    <span class="inline_alert">{{ $errors->first('grade') }}</span>
                </div>

                <div class="input_group">
                    <label for="min_marks">Minimum Marks</label>
                    <input type="number" name="min_marks" id="min_marks" value="{{ old('min_marks') }}">
                    <span class="inline_alert">{{ $errors->first('min_marks') }}</span>
                </div>

                <div class="input_group">
                    <label for="max_marks">Maximum Marks</label>
                    <input type="number" name="max_marks" id="max_marks" value="{{ old('max_marks') }}">
                    <span class="inline_alert">{{ $errors->first('max_marks') }}</span>
                </div>
    
                <div class="input_group">
                    <label for="remarks">Remarks</label>
                    <input type="text" name="remarks" id="remarks" value="{{ old('remarks') }}">
                    <span class="inline_alert">{{ $errors->first('remarks') }}</span>
                </div>
    
                <button type="submit">Save</button>
            </form>
        </div>
    </div>

</x-authenticated-layout>
