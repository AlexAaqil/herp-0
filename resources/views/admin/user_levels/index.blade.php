<x-authenticated-layout class="User_levels">
    <div class="system_nav">
        <a href="{{ route('settings.index') }}">Settings</a>
        <span>User Levels</span>
    </div>

    <x-admin-header header_title="User Levels" :total_count="count($user_levels)" route="{{ route('user-levels.create') }}" />

    <div class="body">
        @if (count($user_levels) > 0)
            <div class="table">
                <table>
                    <thead>
                        <th>User Level</th>
                        <th>Title</th>
                        <th class="actions"></th>
                    </thead>
    
                    <tbody>
                        @foreach ($user_levels as $user_level)
                            <tr class="searchable">
                                <td>{{ $user_level->user_level }}</td>
                                <td>{{ $user_level->title }}</td>
                                <td class="actions">
                                    <div class="action">
                                        <a href="{{ route('user-levels.edit', ['user_level' => $user_level->id]) }}">
                                            <span class="fas fa-eye"></span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>No user levels have been added.</p>
        @endif
    </div>
</x-authenticated-layout>
