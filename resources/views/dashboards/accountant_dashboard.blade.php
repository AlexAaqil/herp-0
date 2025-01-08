<x-authenticated-layout class="Dashboard">
    <section class="Accountant_Dashboard">
        <div class="Hero">
            <p>Hi {{ Auth::user()->first_name }}</p>
        </div>

        <div class="Stats">
            <div class="stat">
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="text">
                    <span>{{ $count_payments }}</span>
                    <a href="{{ route('payment-records.index') }}">Payments</a>
                </div>
            </div>

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
                    <span>{{ $count_classes }}</span>
                    <a href="#">Classes</a>
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