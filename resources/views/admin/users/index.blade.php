<x-authenticated-layout class="Users">
    <x-admin-header header_title="Users" :total_count="count($users)" route="{{ route('users.create') }}" />

    <div class="body">
        <div class="table">
            <table>
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Emp Code</th>
                    <th class="center"></th>
                </thead>
    
                <tbody>
                    @if (count($users) > 0)
                        @foreach ($users as $user)
                            <tr class="searchable {{ $user->user_status == '0' ? 'inactive_user' : 'active' }}">
                                <td>
                                    {{ $user->full_name }}
                                    <span
                                        class="td_span {{ $user->user_level == 0 || $user->user_level == 1 ? 'super_admin' : '' }}">{{ $user->userLevel->title ?? 'unknown' }}</span>
                                </td>
                                <td class="{{ $user->email_verified_at != null ? '' : 'danger' }}">
                                    {{ $user->email }}</td>
                                <td>{{ $user->phone_main }}</td>
                                <td class="{{ $user->emp_code ? '' : 'danger' }}">{{ $user->emp_code ?? 'Undefined' }}</td>
                                <td class="actions">
                                    <div class="action">
                                        <a href="{{ route('users.edit', ['user' => $user->id]) }}">
                                            <span class="fas fa-eye"></span>
                                        </a>
                                    </div>
                                </td>
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
    </div>
</x-authenticated-layout>
