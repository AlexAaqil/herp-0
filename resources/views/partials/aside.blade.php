<aside>
    <div class="brand">
        <div class="profile">
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/images/default_profile.jpg') }}" alt="Profile Image">
            </a>
            <span class="text">
                <a href="{{ route('profile.edit') }}">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</a>
                <span>{{ Auth::user()->email }}</span>
            </span>
        </div>
    </div>

    @php
        $nav_content = collect([
            [
                'route' => 'admin.dashboard',
                'icon' => 'fas fa-home',
                'text' => 'Dashboard',
                'level' => [0, 1],
            ],
            [
                'route' => 'accountant.dashboard',
                'icon' => 'fas fa-home',
                'text' => 'Dashboard',
                'level' => [2],
            ],
            [
                'route' => 'teacher.dashboard',
                'icon' => 'fas fa-home',
                'text' => 'Dashboard',
                'level' => [3],
            ],
            [
                'route' => 'storekeeper.dashboard',
                'icon' => 'fas fa-home',
                'text' => 'Dashboard',
                'level' => [4],
            ],
            [
                'route' => 'users.index',
                'icon' => 'fas fa-users',
                'text' => 'Users',
                'level' => [0, 1],
            ],
            [
                'route' => 'teachers.index',
                'icon' => 'fas fa-chalkboard-teacher',
                'text' => 'Teachers',
                'level' => [0, 1],
            ],
            [
                'route' => 'students.index',
                'icon' => 'fas fa-users',
                'text' => 'Students',
                'level' => [0, 1, 2, 3],
            ],
            [
                'route' => 'teacher-subjects.show',
                'icon' => 'fas fa-brain',
                'text' => 'Subjects',
                'level' => [3],
            ],
            [
                'route' => 'payment-records.index',
                'icon' => 'fas fa-money-bill-alt',
                'text' => 'Payments',
                'level' => [0, 1, 2],
            ],
            [
                'route' => 'expenses.index',
                'icon' => 'fas fa-money-bill-alt',
                'text' => 'Expenses',
                'level' => [0, 1, 2],
            ],
            [
                'route' => 'exam-results.index',
                'icon' => 'fas fa-brain',
                'text' => 'Exams',
                'level' => [0, 1, 3],
            ],
            [
                'route' => 'assignments.index',
                'icon' => 'fas fa-brain',
                'text' => 'Assignments',
                'level' => [0, 1, 3],
            ],
            [
                'route' => 'inventory-records.index',
                'icon' => 'fas fa-barcode',
                'text' => 'Inventory',
                'level' => [0, 1, 2, 4],
            ],
            [
                'route' => 'inventory-categories.index',
                'icon' => 'fas fa-luggage-cart',
                'text' => 'Inv. Categories',
                'level' => [4],
            ],
            [
                'route' => 'leaveouts.index',
                'icon' => 'fas fa-calendar-minus',
                'text' => 'Leaveouts',
                'level' => [0, 1, 3],
            ],
            [
                'route' => 'leaves.index',
                'icon' => 'fas fa-calendar-minus',
                'text' => 'Leaves',
                'level' => [0, 1, 2, 3, 4],
            ],
            [
                'route' => 'disciplinaries.index',
                'icon' => 'fas fa-balance-scale-right',
                'text' => 'Disciplinaries',
                'level' => [0, 1, 3],
            ],
            [
                'route' => 'textbooks.index',
                'icon' => 'fas fa-book',
                'text' => 'Textbooks',
                'level' => [0, 1, 3],
            ],
            [
                'route' => 'blogs.index',
                'icon' => 'fas fa-blog',
                'text' => 'Blogs',
                'level' => [0, 1],
            ],
            [
                'route' => 'user-messages.index',
                'icon' => 'fas fa-comment',
                'text' => 'Messages',
                'level' => [0, 1],
            ],
            [
                'route' => 'settings.index',
                'icon' => 'fas fa-cog',
                'text' => 'Settings',
                'level' => [0, 1],
            ],
        ]);

        $userLevel = Auth::user()->user_level ?? null;
        $navLinks = $nav_content->filter(fn($link) => in_array($userLevel, $link['level']));
    @endphp

    <ul class="links">
        @foreach ($navLinks as $link)
            <li class="link {{ Route::currentRouteName() === $link['route'] ? 'active' : '' }}">
                <a href="{{ route($link['route']) }}">
                    <i class="{{ $link['icon'] }}"></i>
                    <span class="text">{{ $link['text'] }}</span>
                </a>
            </li>
        @endforeach
    </ul>

    <div class="footer">
        <div class="logout">
            <form action="{{ route('logout') }}" method="post">
                @csrf

                <button type="submit">
                    <span class="text">Logout</span>
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>
        </div>
    </div>
</aside>
