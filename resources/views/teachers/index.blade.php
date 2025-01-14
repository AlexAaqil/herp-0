<x-authenticated-layout class="Users">
    <x-admin-header header_title="Teachers" :total_count="count($teachers)" route="{{ route('users.create') }}" />

    <div class="body">
        <table class="table">
            <thead>
                <th class="center">ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Emp Code</th>
            </thead>

            <tbody>
                @if (count($teachers) > 0)
                    @php $id = 1 @endphp
                    @foreach ($teachers as $user)
                        <tr class="searchable {{ $user->user_status == '0' ? 'inactive_user' : 'active' }}">
                            <td class="center">
                                <a href="{{ route('users.edit', ['user' => $user->id]) }}">
                                    {{ $id++ }}
                                </a>
                            </td>
                            <td>
                                {{ $user->full_name }}
                            </td>
                            <td class="{{ $user->email_verified_at != null ? '' : 'danger' }}">
                                {{ $user->email }}</td>
                            <td>{{ $user->phone_main }}</td>
                            <td>{{ $user->emp_code }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">No teachers yet</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-authenticated-layout>
