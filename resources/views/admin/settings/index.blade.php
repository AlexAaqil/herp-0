<x-authenticated-layout class="Settings">
    <h1>Settings</h1>

    <ul>
        <li>
            <a href="{{ route('user-levels.index') }}">User Levels</a>
        </li>
        <li>
            <a href="{{ route('classes.index') }}">Classes</a>
        </li>
        <li>
            <a href="{{ route('payments.index') }}">Payments</a>
        </li>
        <li>
            <a href="#">Dorms</a>
        </li>
        <li>
            <a href="{{ route('grades.index') }}">Grades</a>
        </li>
        <li>
            <a href="{{ route('subjects.index') }}">Subjects</a>
        </li>
    </ul>
</x-authenticated-layout>
