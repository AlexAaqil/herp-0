<x-authenticated-layout class="Admin_Dashboard">
    <section class="Hero">
        <p>Hi {{ Auth::user()->first_name }}</p>
    </section>

    <section class="Stats">
        <div class="stat">
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="text">
                <p class="title">Staff</p>
                <p>
                    <a href="{{ route('users.index') }}">Admins: </a>
                    <span>{{ $count_admins }}</span>
                </p>
                <p>
                    <a href="{{ route('users.index') }}">Teachers: </a>
                    <span>{{ $count_teachers }}</span>
                </p>
                <p>
                    <a href="{{ route('users.index') }}">Accountants: </a>
                    <span>{{ $count_accountants }}</span>
                </p>
            </div>
        </div>

        <div class="stat">
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="text">
                <p class="title">Users</p>
                <p>
                    <a href="{{ route('parents.index') }}">Parents:</a>
                    <span>{{ $count_parents }}</span>
                </p>
                <p>
                    <a href="{{ route('students.index') }}">Students:</a>
                    <span>{{ $count_students }}</span>
                </p>
            </div>
        </div>

        <div class="stat">
            <div class="icon">
                <i class="fas fa-blog"></i>
            </div>
            <div class="text">
                <span>{{ $count_blogs }}</span>
                <a href="{{ route('blogs.index') }}">Blogs</a>
            </div>
        </div>

        <div class="stat">
            <div class="icon">
                <i class="fas fa-comment"></i>
            </div>
            <div class="text">
                <span>{{ $count_user_messages }}</span>
                <a href="{{ route('user-messages.index') }}">Messages</a>
            </div>
        </div>
    </section>
</x-authenticated-layout>
