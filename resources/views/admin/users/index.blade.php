<x-admin-layout class="Users">
    <x-admin-header 
        header_title="Users" 
        :total_count="count($users)"
        route="{{ route('users.create') }}"
    />

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
                @if(count($users) > 0)
                    @php $id = 1 @endphp
                    @foreach($users as $user)
                    <tr class="searchable {{ $user->user_status == '0' ? 'inactive_user' : 'active' }}">
                        <td class="center">
                            <a href="{{ route('users.edit', ['user' => $user->id]) }}">
                                {{ $id++ }}
                            </a>
                        </td>
                        <td>
                            {{ $user->first_name .' '. $user->last_name }} 
                            <span class="td_span {{ ($user->user_level == 0 || $user->user_level == 1) ?'super_admin' : '' }}">{{ $user->userLevel->title ?? 'unknown' }}</span>
                        </td>
                        <td class="{{ $user->email_verified_at != Null ? 'verified' : 'unverified'  }}">{{ $user->email }}</td>
                        <td>{{ $user->phone_main }}</td>
                        <td>{{ $user->emp_code }}</td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">No users yet</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-admin-layout>