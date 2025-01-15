<x-authenticated-layout class="Contact">
    <section class="User_Message">
        <header>
            <div class="icon">
                <a href="{{ route('user-messages.index') }}">
                    <span class="fas fa-arrow-left"></span>
                </a>
            </div>
            <p>
                <span>{{ $user_message->name }}</span>
                <span>{{ $user_message->email }}</span>
                <span>{{ $user_message->phone_number }}</span>
            </p>
        </header>

        <div class="body">
            <div class="form_details">
                <div class="user_message_details">
                    <p class="time">{{ formatted_date($user_message->created_at) }}</p>
                    <p class="user_message">{{ $user_message->message }}</p>
                </div>

                <a href="mailto:{{ $user_message->email }}" class="btn">Email this user</a>
            </div>

            <form id="deleteForm_{{ $user_message->id }}"
                action="{{ route('user-messages.destroy', ['user_message' => $user_message->id]) }}" method="post">
                @csrf
                @method('DELETE')

                <button type="button" class="btn_danger"
                    onclick="deleteItem({{ $user_message->id }}, 'user message');">
                    <i class="fas fa-trash-alt delete"></i>
                    <span>Delete</span>
                </button>
            </form>
        </div>
    </section>

    <x-slot name="javascript">
        <x-sweetalert />
    </x-slot>
</x-authenticated-layout>
