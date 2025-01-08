<x-authenticated-layout class="Dashboard">
    <section class="Teacher_Dashboard">
        <div class="Hero">
            <p>Hi {{ Auth::user()->first_name }}</p>
        </div>
    
        <div class="Stats">
            <div class="stat">
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="text">
                    <span>{{ $count_students }}</span>
                    <a href="{{ route('students.index') }}">Students</a>
                </div>
            </div>

            <div class="stat">
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="text">
                    <span>{{ $count_subjects }}</span>
                    <a href="{{ route('exam-results.index') }}">Subjects</a>
                </div>
            </div>

            <div class="stat">
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="text">
                    <span>{{ $count_classes }}</span>
                    <a href="#">Classes</a>
                </div>
            </div>
        </div>
    </section>
</x-authenticated-layout>