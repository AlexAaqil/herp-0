<x-authenticated-layout class="Dashboard">
    <section class="Admin_Dashboard">
        <div class="Hero">
            <p>Hi {{ Auth::user()->first_name }}</p>
        </div>

        <div class="Stats">
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
                    <i class="fas fa-cog"></i>
                </div>
                <div class="text">
                    <p class="title">General</p>
                    <p>
                        <a href="{{ route('subjects.index') }}">Subjects:</a>
                        <span>{{ $count_subjects }}</span>
                    </p>
                    <p>
                        <a href="{{ route('class_sections.index') }}">Classes:</a>
                        <span>{{ $count_classes }}</span>
                    </p>
                    <p>
                        <a href="#">Dorms:</a>
                        <span>{{ $count_dorms }}</span>
                    </p>
                </div>
            </div>

            <div class="stat">
                <div class="icon">
                    <i class="fas fa-blog"></i>
                </div>
                <div class="text">
                    <p class="title">Blogs</p>
                    <p>
                        <a href="{{ route('blogs.index') }}">Blogs:</a>
                        <span>{{ $count_blogs }}</span>
                    </p>
                </div>
            </div>

            <div class="stat">
                <div class="icon">
                    <i class="fas fa-comment"></i>
                </div>
                <div class="text">
                    <p class="title">Messages</p>
                    <p>
                        <a href="{{ route('user-messages.index') }}">Messages:</a>
                        <span>{{ $count_user_messages }}</span>
                    </p>
                </div>
            </div>
        </div>

        <div class="Stats Payments">
            <div class="stat">
                <div class="icon">
                    <i class="fas fa-money-bill-alt"></i>
                </div>
                <div class="text">
                    <span class="number" data-target="{{ $total_payments_expected }}">0</span>
                    <span>Expected</span>
                </div>
            </div>

            <div class="stat">
                <div class="icon">
                    <i class="fas fa-money-check"></i>
                </div>
                <div class="text">
                    <span class="success number" data-target="{{ $total_payments_made }}">0</span>
                    <span>Paid</span>
                </div>
            </div>

            <div class="stat">
                <div class="icon">
                    <i class="fas fa-money-check-alt"></i>
                </div>
                <div class="text">
                    <span class="danger number" data-target="{{ $total_pending_payments }}">0</span>
                    <span>Pending</span>
                </div>
            </div>
        </div>
    </section>

    <x-slot name="javascript">
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const counters = document.querySelectorAll(".number");

                // Helper function to format numbers with commas
                const numberFormat = (number) => {
                    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                };

                const animateCounter = (counter) => {
                    const target = +counter.getAttribute("data-target");
                    const speed = 200;
                    let count = 0;

                    const updateCounter = () => {
                        const increment = Math.max(Math.ceil(target / speed),
                        1); // Ensure at least 1 increment per update
                        if (count < target) {
                            count += increment;
                            counter.textContent = count > target ? target : count; // Prevent overshooting
                            setTimeout(updateCounter, 20); // Adjust timing for smoothness
                        } else {
                            counter.textContent = numberFormat(target); // Ensure final target is displayed
                        }
                    };

                    updateCounter();
                };

                const observerOptions = {
                    root: null, // Observe within the viewport
                    threshold: 0.2, // Trigger when 20% of the section is visible
                };

                const observer = new IntersectionObserver((entries, observer) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            const statsSection = entry.target;
                            const countersInSection = statsSection.querySelectorAll(".number");

                            countersInSection.forEach((counter) => animateCounter(counter));

                            observer.unobserve(
                            statsSection); // Stop observing once animation is triggered
                        }
                    });
                }, observerOptions);

                const statsSection = document.querySelector(".Payments");
                observer.observe(statsSection);
            });
        </script>
    </x-slot>
</x-authenticated-layout>
