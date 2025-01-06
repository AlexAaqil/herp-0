<aside>
    <div class="header">
        <p>{{ $student->first_name }}</p>
    </div>

    <ul class="links">
        <li>
            <a href="{{ route('student-details') }}">Home</a>
        </li>
        <li>
            <a href="{{ route('student-leavouts') }}">Leaveouts</a>
        </li>
        <li>
            <a href="{{ route('student-textbooks') }}">Textbooks</a>
        </li>
    </ul>

    <div class="footer">
        <div class="logout">
            <form action="{{ route('student_logout') }}" method="post">
                @csrf

                <button type="submit">
                    <span class="text">Logout</span>
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>
        </div>
    </div>
</aside>
