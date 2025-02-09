<x-authenticated-layout class="Timeslots">
    <div class="custom_form">
        
        <header>
            <p>Update Timeslot</p>
            
            <div class="system_nav">
                <a href="{{ route('settings.index') }}">Settings</a>
                <a href="{{ route('timeslots.index') }}">Timeslots</a>
                <span>Edit</span>
            </div>
        </header>

        <form action="{{ route('timeslots.update', $timeslot->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="input_group">
                <label for="day" class="required">Day</label>
                <select name="day" id="day">
                    <option value="">Select Day</option>
                    <option value="Monday" {{ old('day', $timeslot->day) == 'Monday' ? 'selected' : '' }}>Monday</option>
                    <option value="Tuesday" {{ old('day', $timeslot->day) == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                    <option value="Wednesday" {{ old('day', $timeslot->day) == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                    <option value="Thursday" {{ old('day', $timeslot->day) == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                    <option value="Friday" {{ old('day', $timeslot->day) == 'Friday' ? 'selected' : '' }}>Friday</option>
                </select>
                <span class="inline_alert">{{ $errors->first('title') }}</span>
            </div>

            <div class="input_group">
                <label for="start_time" class="required">Start Time</label>
                <input type="time" name="start_time" id="start_time" value="{{ old('start_time', $timeslot->start_time) }}">
                <span class="inline_alert">{{ $errors->first('start_time') }}</span>
            </div>

            <div class="input_group">
                <label for="end_time" class="required">Start Time</label>
                <input type="time" name="end_time" id="end_time" value="{{ old('end_time', $timeslot->end_time) }}">
                <span class="inline_alert">{{ $errors->first('end_time') }}</span>
            </div>

            <div class="buttons">
                <button type="submit">Update</button>

                <button type="button" class="btn_danger" onclick="deleteItem({{ $timeslot->id }}, 'timeslot');"
                    form="deleteForm_{{ $timeslot->id }}">
                    <i class="fas fa-trash-alt delete"></i>
                    <span>Delete</span>
                </button>
            </div>
        </form>

        <form id="deleteForm_{{ $timeslot->id }}" action="{{ route('timeslots.destroy', $timeslot->id) }}"
            method="post" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>

    <x-slot name="javascript">
        <x-sweetalert />
    </x-slot>
</x-authenticated-layout>
