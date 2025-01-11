<x-authenticated-layout class="Settings">
    <div class="system_nav">
        <a href="{{ route('settings.index') }}">Settings</a>
        <span>/ General</span>
    </div>

    <x-admin-header header_title="Settings" :total_count="count($settings)" />

    <div class="row_container">
        <div class="custom_form">
            <header>
                <p>School Information</p>
            </header>

            <div class="show_details">
                <div class="details">
                    {{-- Display the school logo first --}}
                    @php
                        $schoolLogo = $settings->firstWhere('key', 'school_logo');
                    @endphp
                    @if($schoolLogo && $schoolLogo->value)
                        <p>
                            <span>School Logo</span>
                            <span>
                                <img src="{{ asset('storage/'.$schoolLogo->value) }}" alt="School Logo" style="max-width: 100px;">
                            </span>
                        </p>
                    @else
                        <p><span>School Logo</span><span>No image uploaded</span></p>
                    @endif

                    {{-- Display other settings --}}
                    @foreach($settings as $setting)
                        @if($setting->key !== 'school_logo')
                            <p>
                                <span>{{ ucwords(str_replace('_', ' ', $setting->key)) }}</span>
                                @if($setting->type === 'file')
                                    @if($setting->value)
                                        <span>
                                            <img src="{{ asset('storage/'.$setting->value) }}" alt="{{ $setting->key }}" style="max-width: 100px;">
                                        </span>
                                    @else
                                        <span>No image uploaded</span>
                                    @endif
                                @else
                                    <span class="{{ $setting->value ? '' : 'danger' }}">: {{ $setting->value ?? 'Undefined' }}</span>
                                @endif
                            </p>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="custom_form">
            <header>
                <p>Update Settings</p>
            </header>

            <form action="{{ route('settings.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                @foreach($settings as $setting)
                    <div class="input_group">
                        <label for="{{ $setting->key }}">{{ ucwords(str_replace('_', ' ', $setting->key)) }}</label>

                        @if($setting->type === 'text')
                            <input type="text" name="{{ $setting->key }}" id="{{ $setting->key }}"
                                value="{{ old($setting->key, $setting->value) }}">
                        @elseif($setting->type === 'email')
                            <input type="email" name="{{ $setting->key }}" id="{{ $setting->key }}"
                                value="{{ old($setting->key, $setting->value) }}">
                        @elseif($setting->type === 'file')
                            <input type="file" name="{{ $setting->key }}" id="{{ $setting->key }}">
                            @if($setting->value)
                                <img src="{{ asset('storage/'.$setting->value) }}" alt="Current Logo" style="max-width: 100px;">
                            @endif
                        @endif

                        <span class="inline_alert">{{ $errors->first($setting->key) }}</span>
                    </div>
                @endforeach

                <button type="submit">Update</button>
            </form>
        </div>
    </div>
</x-authenticated-layout>
