<x-authenticated-layout class="Subjects">
    <div class="system_nav">
        <a href="{{ route('settings.index') }}">Settings</a>
        <span>Subjects</span>
    </div>

    <x-admin-header header_title="Subjects" :total_count="count($subjects)" />

    <div class="row_container">
        <div class="body">
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Short Name</th>
                            <th>Code</th>
                            <th class="actions"></th>
                        </tr>
                    </thead>
        
                    <tbody>
                        @if (count($subjects) > 0)
                            @foreach ($subjects as $subject)
                                <tr class="searchable">
                                    <td>{{ $subject->title }}</td>
                                    <td>{{ $subject->short_name ?? 'Undefined' }}</td>
                                    <td>{{ $subject->code ?? 'Undefined' }}</td>
                                    <td>
                                        <div class="actions">
                                            <div class="action">
                                                <a href="{{ route('subjects.edit', $subject->id) }}">
                                                    <span class="fas fa-eye"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">No subjects have been added yet</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="custom_form">
            <header>
                <p>New Subject</p>
            </header>
    
            <form action="{{ route('subjects.store') }}" method="post">
                @csrf

                <div class="input_group">
                    <label for="title">Subject</label>
                    <input type="text" name="title" id="title" placeholder="Subject"
                        value="{{ old('title') }}">
                    <span class="inline_alert">{{ $errors->first('title') }}</span>
                </div>
    
                <div class="input_group">
                    <label for="short_name">Short Name</label>
                    <input type="text" name="short_name" id="short_name" value="{{ old('short_name') }}">
                    <span class="inline_alert">{{ $errors->first('short_name') }}</span>
                </div>

                <div class="input_group">
                    <label for="code">Code</label>
                    <input type="text" name="code" id="code" value="{{ old('code') }}">
                    <span class="inline_alert">{{ $errors->first('code') }}</span>
                </div>
    
                <button type="submit">Save</button>
            </form>
        </div>
    </div>

</x-authenticated-layout>
