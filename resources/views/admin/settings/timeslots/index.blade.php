<x-authenticated-layout class="Timeslots">
    <div class="system_nav">
        <a href="{{ route('settings.index') }}">Settings</a>
        <span>Timeslots</span>
    </div>

    <x-admin-header header_title="Timeslots" :total_count="count($timeslots)" />

    <div class="row_container">
        <div class="body">
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>Day</th>
                            <th>Time</th>
                            <th class="actions"></th>
                        </tr>
                    </thead>
        
                    <tbody>
                        @if (count($timeslots) > 0)
                            @foreach ($timeslots as $timeslot)
                                <tr class="searchable">
                                    <td>{{ $timeslot->day }}</td>
                                    <td>{{ $timeslot->start_time }} - {{ $timeslot->end_time }}</td>
                                    <td>
                                        <div class="actions">
                                            <div class="action">
                                                <a href="{{ route('timeslots.edit', $timeslot->id) }}">
                                                    <span class="fas fa-eye"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">No timeslots have been added yet</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="custom_form">
            <header>
                <p>New Timeslot</p>
            </header>
    
            <form action="{{ route('timeslots.store') }}" method="post">
                @csrf

                <div class="input_group">
                    <label for="day" class="required">Day</label>
                    <select name="day" id="day">
                        <option value="">Select Day</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                    </select>
                    <span class="inline_alert">{{ $errors->first('title') }}</span>
                </div>
    
                <div class="input_group">
                    <label for="start_time" class="required">Start Time</label>
                    <input type="time" name="start_time" id="start_time">
                    <span class="inline_alert">{{ $errors->first('start_time') }}</span>
                </div>

                <div class="input_group">
                    <label for="end_time" class="required">Start Time</label>
                    <input type="time" name="end_time" id="end_time">
                    <span class="inline_alert">{{ $errors->first('end_time') }}</span>
                </div>
    
                <button type="submit">Save</button>
            </form>
        </div>
    </div>

</x-authenticated-layout>
