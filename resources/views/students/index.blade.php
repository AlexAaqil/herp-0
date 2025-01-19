<x-app-layout>
    <main class="app_main StudentPortal">
        @include('partials.student_aside')

        <div class="app_content">
            <div class="details student_details">
                <div class="image">
                    <img src="{{ $student->image ? asset('storage/' . $student->image) : asset('assets/images/default_profile.jpg') }}" alt="Student Image" style="max-width: 100px;">
                </div>

                <div class="text">
                    <p>
                        <span>Name</span>
                        <span>{{ $student->first_name . ' ' . $student->last_name }}</span>
                    </p>
                    <p>
                        <span>ADM. No</span>
                        <span>{{ $student->registration_number }}</span>
                    </p>
                    <p>
                        <span>Class</span>
                        <span>{{ $student->studentClassSection->title }}</span>
                    </p>
                </div>
            </div>

            <div class="details parents">
                <p class="title">Parent / Gurdian Details</p>
                @foreach ($student->parents as $parent)
                    <p>
                        <span>{{ $parent->first_name . ' ' . $parent->last_name }}</span>
                        <span>{{ $parent->phone_main . ($parent->phone_other ? ' / ' . $parent->phone_other : '') }}</span>
                        <span>{{ $parent->email }}</span>
                    </p>
                    <div class="separator"></div>
                @endforeach
            </div>
        </div>
    </main>
</x-app-layout>
