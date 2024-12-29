<x-authenticated-layout class="Users">
    <x-admin-header header_title="Parents" :total_count="count($parents)" route="{{ route('parents.create') }}" />

    <div class="body">
        @if (count($parents) > 0)
            <table class="table">
                <thead>
                    <th class="center">ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                </thead>

                <tbody>
                    @php $id = 1 @endphp
                    @foreach ($parents as $parent)
                        <tr class="searchable">
                            <td class="center">
                                <a href="{{ route('parents.edit', ['parent' => $parent->id]) }}">
                                    {{ $id++ }}
                                </a>
                            </td>
                            <td>{{ $parent->first_name . ' ' . $parent->last_name }}</td>
                            <td>{{ $parent->email }}</td>
                            <td>{{ $parent->phone_main }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No parents have been added.</p>
        @endif
    </div>
</x-authenticated-layout>
