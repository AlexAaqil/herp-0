<x-authenticated-layout class="Users">
    <div class="custom_form">
        <header>
            <p>Update Parent</p>
        </header>

        <form action="{{ route('parents.update', $parent->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="row_input_group_3">
                <div class="input_group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" id="first_name" placeholder="First Name"
                        value={{ old('first_name', $parent->first_name) }}>
                    <span class="inline_alert">{{ $errors->first('first_name') }}</span>
                </div>

                <div class="input_group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" id="last_name" placeholder="Last Name"
                        value={{ old('last_name', $parent->last_name) }}>
                    <span class="inline_alert">{{ $errors->first('last_name') }}</span>
                </div>

                <div class="input_group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" placeholder="Email Address"
                        value="{{ old('email', $parent->email) }}">
                    <span class="inline_alert">{{ $errors->first('email') }}</span>
                </div>
            </div>

            <div class="row_input_group_3">
                <div class="input_group">
                    <label for="phone_main">Phone Number</label>
                    <input type="text" name="phone_main" id="phone_main" placeholder="0746055487 or 0114055487"
                        value="{{ old('phone_main', $parent->phone_main) }}">
                    <span class="inline_alert">{{ $errors->first('phone_main') }}</span>
                </div>

                <div class="input_group">
                    <label for="phone_other">Other Phone Number</label>
                    <input type="text" name="phone_other" id="phone_other" placeholder="0746055487 or 0114055487"
                        value="{{ old('phone_other', $parent->phone_other) }}">
                    <span class="inline_alert">{{ $errors->first('phone_other') }}</span>
                </div>

                <div class="input_group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" placeholder="Ruii, Kiambu"
                        value="{{ old('address', $parent->address) }}">
                    <span class="inline_alert">{{ $errors->first('address') }}</span>
                </div>
            </div>

            <div class="buttons">
                <button type="submit">Update</button>

                <button type="button" class="delete_btn" onclick="deleteItem({{ $parent->id }}, 'parent');"
                    form="deleteForm_{{ $parent->id }}">
                    <i class="fas fa-trash-alt delete"></i>
                    <span>Delete</span>
                </button>
            </div>
        </form>

        <form id="deleteForm_{{ $parent->id }}" action="{{ route('parents.destroy', $parent->id) }}" method="post"
            style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>

    <x-slot name="javascript">
        <x-sweetalert />
    </x-slot>
</x-authenticated-layout>
