<x-authenticated-layout class="Users">
    <x-admin-header header_title="Teachers" :total_count="count($teachers)" route="{{ route('users.create') }}" />

    <div class="body">
        <div class="table">
            <table>
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Emp Code</th>
                    <th></th>
                </thead>
    
                <tbody>
                    @if (count($teachers) > 0)
                        @php $id = 1 @endphp
                        @foreach ($teachers as $user)
                            <tr class="searchable {{ $user->user_status == '0' ? 'inactive_user' : 'active' }}">
                                <td>
                                    {{ $user->full_name }}
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
                            <td colspan="5">No teachers yet</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-authenticated-layout>
