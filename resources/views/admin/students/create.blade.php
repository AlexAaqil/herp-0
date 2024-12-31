<x-authenticated-layout class="Users">
    <x-searchable-select-header />

    <div class="custom_form">
        <header>
            <p>New Student</p>
        </header>

        <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="gender" value="{{ config('globals.students_gender') }}">

            <div class="row_input_group_3">
                <div class="input_group">
                    <label for="registration_number">Registration Number</label>
                    <input type="text" name="registration_number" id="registration_number"
                        value="{{ old('registration_number') }}">
                    <span class="inline_alert">{{ $errors->first('registration_number') }}</span>
                </div>

                <div class="input_group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}">
                    <span class="inline_alert">{{ $errors->first('first_name') }}</span>
                </div>

                <div class="input_group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}">
                    <span class="inline_alert">{{ $errors->first('last_name') }}</span>
                </div>
            </div>

            <div class="row_input_group_3">
                <div class="input_group">
                    <label for="class_section_id">Class Section</label>
                    <select name="class_section_id" id="class_section_id">
                        <option value="">Select Class</option>
                        @foreach ($class_sections as $class_section)
                            <option value="1"
                                {{ old('class_section_id') == $class_section->id ? 'selected' : '' }}>
                                {{ $class_section->title }}</option>
                        @endforeach
                    </select>
                    <span class="inline_alert">{{ $errors->first('class_section_id') }}</span>
                </div>

                <div class="input_group">
                    <label for="class_id">Dorm</label>
                    <select name="dorm_id" id="dorm_id">
                        <option value="">Select Dorm</option>
                        <option value="">xxx</option>
                    </select>
                    <span class="inline_alert">{{ $errors->first('dorm_id') }}</span>
                </div>

                <div class="input_group">
                    <label for="dorm_room_number">Dorm Room Number</label>
                    <input type="text" name="dorm_room_number" id="dorm_room_number"
                        value="{{ old('dorm_room_number') }}">
                    <span class="inline_alert">{{ $errors->first('dorm_room_number') }}</span>
                </div>
            </div>

            <div class="row_input_group_3">
                <div class="input_group">
                    <label for="year_admitted">Year Admitted</label>
                    <input type="number" id="year_admitted" name="year_admitted" min="2000" max="2060"
                        step="1" value="{{ old('year_admitted') }}">
                    <span class="inline_alert">{{ $errors->first('year_admitted') }}</span>
                </div>

                <div class="input_group">
                    <label for="graduation_status">Graduation Status?</label>
                    <div class="custom_radio_buttons">
                        <label>
                            <input class="option_radio" type="radio" name="graduation_status" id="yes"
                                value="1" {{ old('graduation_status') == '1' ? 'checked' : '' }}>
                            <span>Graduated</span>
                        </label>

                        <label>
                            <input class="option_radio" type="radio" name="graduation_status" id="no"
                                value="0" {{ old('graduation_status', 0) == '0' ? 'checked' : '' }}>
                            <span>Not</span>
                        </label>
                    </div>
                    <span class="inline_alert">{{ $errors->first('graduation_status') }}</span>
                </div>

                <div class="input_group">
                    <label for="graduation_date">Graudation Date</label>
                    <input type="date" id="graduation_date" name="graduation_date"
                        value="{{ old('graduation_date') }}">
                    <span class="inline_alert">{{ $errors->first('graduation_date') }}</span>
                </div>
            </div>

            <div class="row_input_group">
                <div class="input_group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" name="dob" id="dob" value="{{ old('dob') }}">
                    <span class="inline_alert">{{ $errors->first('dob') }}</span>
                </div>

                <div class="input_group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                    <span class="inline_alert">{{ $errors->first('password') }}</span>
                </div>
            </div>

            <div class="another_section">
                <p class="title">Parent Information</p>
            </div>
            <div class="row_input_group">
                <div class="input_group">
                    <label for="parent_id">Select Parent</label>
                    <select name="parent_id[]" id="parent_id" class="searchable_select" multiple>
                        <option value="">Search for a parent</option>
                        @foreach ($parents as $parent)
                            <option value="{{ $parent->id }}"
                                {{ in_array($parent->id, old('parent_id', [])) ? 'selected' : '' }}>
                                {{ $parent->phone_main }} - {{ $parent->first_name }} {{ $parent->last_name }}
                            </option>
                        @endforeach
                    </select>                    
                    <span class="inline_alert">{{ $errors->first('parent_id') }}</span>
                </div>
            </div>

            <button type="submit">Save</button>
        </form>
    </div>

    <div class="another_section">
        <div class="custom_form">
            <header>
                <p>New Parent</p>
            </header>

            <form action="{{ route('parents.store') }}" method="post">
                @csrf

                <div class="row_input_group_3">
                    <div class="input_group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name" placeholder="First Name"
                            value={{ old('first_name') }}>
                        <span class="inline_alert">{{ $errors->first('first_name') }}</span>
                    </div>

                    <div class="input_group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name" placeholder="Last Name"
                            value={{ old('last_name') }}>
                        <span class="inline_alert">{{ $errors->first('last_name') }}</span>
                    </div>

                    <div class="input_group">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" placeholder="Email Address"
                            value="{{ old('email') }}">
                        <span class="inline_alert">{{ $errors->first('email') }}</span>
                    </div>
                </div>

                <div class="row_input_group_3">
                    <div class="input_group">
                        <label for="phone_main">Phone Number</label>
                        <input type="text" name="phone_main" id="phone_main"
                            placeholder="0746055487 or 0114055487" value="{{ old('phone_main') }}">
                        <span class="inline_alert">{{ $errors->first('phone_main') }}</span>
                    </div>

                    <div class="input_group">
                        <label for="phone_other">Other Phone Number</label>
                        <input type="text" name="phone_other" id="phone_other"
                            placeholder="0746055487 or 0114055487" value="{{ old('phone_other') }}">
                        <span class="inline_alert">{{ $errors->first('phone_other') }}</span>
                    </div>

                    <div class="input_group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" placeholder="Ruii, Kiambu"
                            value="{{ old('address') }}">
                        <span class="inline_alert">{{ $errors->first('address') }}</span>
                    </div>
                </div>

                <button type="submit">Save</button>
            </form>
        </div>
    </div>

    <x-slot name="javascript">
        <script>
            $(document).ready(function() {
                $('#parent_id').chosen();
            })
        </script>
    </x-slot>
</x-authenticated-layout>
