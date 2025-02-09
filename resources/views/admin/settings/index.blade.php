<x-authenticated-layout class="Settings">
    <h1>Settings</h1>

    <ul>
        <li>
            <a href="{{ route('settings.general') }}">General</a>
        </li>
        <li>
            <a href="{{ route('payments.index') }}">Payments</a>
        </li>
        <li>
            <a href="{{ route('classes.index') }}">Classes</a>
        </li>
        <li>
            <a href="{{ route('dorms.index') }}">Dorms</a>
        </li>
        <li>
            <a href="{{ route('subjects.index') }}">Subjects</a>
        </li>
        <li>
            <a href="{{ route('timeslots.index') }}">Timeslots</a>
        </li>
        <li>
            <a href="{{ route('subject-teachers.index') }}">Subject Teachers</a>
        </li>
        <li>
            <a href="{{ route('exams.index') }}">Exams</a>
        </li>
        <li>
            <a href="{{ route('grades.index') }}">Grades</a>
        </li>
        <li>
            <a href="{{ route('user-levels.index') }}">User Levels</a>
        </li>
    </ul>
</x-authenticated-layout>
