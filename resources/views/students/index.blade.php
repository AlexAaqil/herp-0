<x-app-layout>
    <main class="app_main StudentPortal">
        @include('partials.student_aside')

        <div class="app_content">
            <h1>{{ $student->first_name . ' ' . $student->last_name }}</h1>

            <div class="details">
                <p>
                    <span>Admission Number</span>
                    <span>{{ $student->registration_number }}</span>
                </p>
                <p>
                    <span>Class</span>
                    <span>{{ $student->studentClassSection->title }}</span>
                </p>
            </div>

            <div class="details">
                <p class="title">Parent / Gurdian Details</p>
                @foreach ($student->parents as $parent)
                    <p>
                        <span>Name</span>
                        <span>{{ $parent->first_name . ' ' . $parent->last_name }}</span>
                    </p>
                    <p>
                        <span>Phone</span>
                        <span>{{ $parent->phone_main . ($parent->phone_other ? ' / ' . $parent->phone_other : '') }}</span>
                    </p>
                    <p>
                        <span>Email</span>
                        <span>{{ $parent->email }}</span>
                    </p>
                    <div class="separator"></div>
                @endforeach
            </div>
        </div>
    </main>
</x-app-layout>
