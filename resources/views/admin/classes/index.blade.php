<x-authenticated-layout class="Classes">
    <div class="system_nav">
        <a href="{{ route('settings.index') }}">Settings</a>
        <span>Classes</span>
    </div>

    <x-admin-header header_title="Classes" :total_count="count($classes)" route="{{ route('classes.create') }}" />

    <div class="body">
        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>Class Name</th>
                        <th class="actions"></th>
                    </tr>
                </thead>
    
                <tbody>
                    @if (count($classes) > 0)
                        @php $id = 1 @endphp
                        @foreach ($classes as $class)
                            <tr class="searchable">
                                <td>{{ $class->class_name }}</td>
                                <td class="actions">
                                    <div class="action">
                                        <a href="{{ route('classes.edit', $class->id) }}">
                                            <span class="fas fa-eye"></span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No classes have been added yet</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-authenticated-layout>
