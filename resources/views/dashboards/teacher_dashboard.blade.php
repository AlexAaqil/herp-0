<x-authenticated-layout class="Dashboard">
    <section class="Teacher_Dashboard">
        <div class="Hero">
            <p>Hi {{ Auth::user()->first_name }}</p>
        </div>

        <div class="Stats">
            <div class="stat">
                <div class="icon">
                    <i class="fas fa-book"></i>
                </div>
                <div class="text">
                    <span>{{ $count_teacher_subjects }}</span>
                    <a href="{{ route('exam-results.index') }}">{{ Str::plural('Subject', $count_teacher_subjects) }} scheduled</a>
                </div>
            </div>

            <div class="stat">
                <div class="icon">
                    <i class="fas fa-chalkboard"></i>
                </div>
                <div class="text">
                    <span>{{ $count_teacher_classes }}</span>
                    <a href="#">{{ Str::plural('Class', $count_teacher_classes) }} assigned.</a>
                </div>
            </div>
        </div>

        <div class="schedule">
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Monday</th>
                            <th>Tuesday</th>
                            <th>Wednesday</th>
                            <th>Thursday</th>
                            <th>Friday</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($schedule as $time => $days)
                            <tr>
                                <td>{{ $time }}</td>
                                @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'] as $day)
                                    <td>
                                        @if(isset($days[$day]))
                                            {{ $days[$day]['subject'] }} ({{ $days[$day]['class'] }})
                                        @else
                                            -
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No schedule has been assigned.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-authenticated-layout>