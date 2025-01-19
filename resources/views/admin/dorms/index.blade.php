<x-authenticated-layout class="Dorms">
    <div class="system_nav">
        <a href="{{ route('settings.index') }}">Settings</a>
        <span>Dorms</span>
    </div>

    <x-admin-header header_title="Dorms" :total_count="count($dorms)" />

    <div class="row_container">
        <div class="body">            
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>Dorm</th>
                            <th class="actions"></th>
                        </tr>
                    </thead>
    
                    <tbody>
                        @if (count($dorms) > 0)
                            @foreach ($dorms as $dorm)
                                <tr class="searchable">
                                    <td>{{ $dorm->title }}</td>
                                    <td class="actions">
                                        <div class="action">
                                            <a href="{{ route('dorms.edit', $dorm->id) }}">
                                                <span class="fas fa-eye"></span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">No dorms have been added yet</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="custom_form">
            <header>
                <p>New Dorm</p>
            </header>

            <form action="{{ route('dorms.store') }}" method="post">
                @csrf

                <div class="input_group">
                    <label for="title">Dorm Name</label>
                    <input type="text" name="title" id="title"
                        value="{{ old('title') }}">
                    <span class="inline_alert">{{ $errors->first('title') }}</span>
                </div>

                <button type="submit">Save</button>
            </form>
        </div>
    </div>

</x-authenticated-layout>
