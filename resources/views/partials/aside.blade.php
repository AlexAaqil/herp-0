<aside>
    <div class="brand">
        <a href="{{ route('home') }}">{{ env('APP_NAME') }}</a>
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
                'route' => 'users.index',
                'icon' => 'fas fa-users',
                'text' => 'Users',
                'level' => [0, 1],
            ],
            [
                'route' => 'students.index',
                'icon' => 'fas fa-users',
                'text' => 'Students',
                'level' => [0, 1, 2, 3],
            ],
            [
                'route' => 'parents.index',
                'icon' => 'fas fa-users',
                'text' => 'Parents',
                'level' => [0, 1, 2, 3],
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
        <div class="profile">
            <a href="{{ route('profile.edit') }}">
                <img src="{{ asset('assets/images/default_profile.jpg') }}" alt="Profile Image">
            </a>
            <span class="text">
                <a href="{{ route('profile.edit') }}">
                    {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
                </a>
                <span>{{ Auth::user()->email }}</span>
            </span>
        </div>

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
