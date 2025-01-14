<x-general-layout class="Home_Page">
    <section class="Hero">
        <div class="container">
            <p class="sub_title">Choose the Best</p>
            <p class="title">Education for your Future</p>

            <div class="button">
                <a href="{{ route('login') }}" class="btn_hero">Get Started</a>
            </div>
        </div>
    </section>

    <section class="About">
        <div class="container">
            <div class="about_card">
                <div class="icon">
                    <i class="fa fa-book"></i>
                </div>

                <div class="text">
                    <p class="title">Modern Libraries</p>
                    <p>Step into a world of knowledge with our fully equipped libraries, fostering a love for reading and lifelong learning.</p>
                </div>
            </div>

            <div class="about_card">
                <div class="icon">
                    <i class="fa fa-bong"></i>
                </div>

                <div class="text">
                    <p class="title">Laboratories</p>
                    <p>Experience hands-on learning in our cutting-edge science labs, designed to ignite curiosity and inspire innovation.</p>
                </div>
            </div>

            <div class="about_card">
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>

                <div class="text">
                    <p class="title">Expert Teachers</p>
                    <p>Learn from dedicated and highly qualified educators who are passionate about shaping the future, one student at a time.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="Mission_Vision">
        <div class="container">
            <div class="content">
                <div class="image">
                    <img src="{{ asset('assets/images/hero.jpg') }}" alt="Mission / Vission">
                </div>

                <div class="text">
                    <div class="statement">
                        <p class="sub_title">Mission</p>
                        <p>To nurture well-rounded individuals by providing quality education, instilling moral values, and fostering creativity, critical thinking, and leadership skills for a better tomorrow. We are committed to unlocking the potential of every student in an environment that celebrates diversity and inclusion.</p>
                    </div>

                    <div class="statement">
                        <p class="sub_title">Vision</p>
                        <p>To be a leading center of academic excellence and character development in Kenya, producing graduates equipped to contribute meaningfully to society and inspire change on a global scale. We envision a future where our students lead with integrity, innovation, and resilience.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="Statistics">
        <div class="container">
            <div class="stat">
                <p class="number" data-target="8000">0</p>
                <p class="text">Students</p>
            </div>
    
            <div class="stat">
                <p class="number" data-target="80">0</p>
                <p class="text">Teachers</p>
            </div>
    
            <div class="stat">
                <p class="number" data-target="14">0</p>
                <p class="text">Subjects</p>
            </div>
        </div>
    </section>

    <section class="Team">
        <div class="container">
            <h2>Our Team</h2>
            <div class="members">
                <div class="member">
                    <div class="image">
                        <img src="{{ asset('assets/images/default_profile.jpg') }}" alt="Staff Member">
                    </div>
                    <div class="text">
                        <p class="title">Charles Maina</p>
                        <p>Principal</p>
                        <p class="remarks">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum ducimus ab aspernatur.</p>
                    </div>
                </div>

                <div class="member">
                    <div class="image">
                        <img src="{{ asset('assets/images/default_profile.jpg') }}" alt="Staff Member">
                    </div>
                    <div class="text">
                        <p class="title">Charles Maina</p>
                        <p>Principal</p>
                        <p class="remarks">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum ducimus ab aspernatur.</p>
                    </div>
                </div>

                <div class="member">
                    <div class="image">
                        <img src="{{ asset('assets/images/default_profile.jpg') }}" alt="Staff Member">
                    </div>
                    <div class="text">
                        <p class="title">Charles Maina</p>
                        <p>Principal</p>
                        <p class="remarks">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum ducimus ab aspernatur.</p>
                    </div>
                </div>

                <div class="member">
                    <div class="image">
                        <img src="{{ asset('assets/images/default_profile.jpg') }}" alt="Staff Member">
                    </div>
                    <div class="text">
                        <p class="title">Charles Maina</p>
                        <p>Principal</p>
                        <p class="remarks">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum ducimus ab aspernatur.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="Achievements">
        <div class="container">
            <p class="title">Our Achievements</p>
            <div class="achievement_card">
                <p class="sub_title">National Science Fair 2023</p>
                <p>First-place winners in the innovative technology category.</p>
            </div>
            <div class="achievement_card">
                <p class="sub_title">Regional Soccer Champions</p>
                <p>Our soccer team clinched the 2023 regional championship trophy.</p>
            </div>
            <div class="achievement_card">
                <p class="sub_title">Art & Culture Exhibition</p>
                <p>Recognized for outstanding contributions to promoting Kenyan culture through art.</p>
            </div>
        </div>
    </section>

    <section class="News">
        <div class="container">
            <p class="title">Latest News & Events</p>
            <div class="news_card">
                <p class="sub_title">Open Day 2024</p>
                <p>Join us on February 15th for an open day to experience our school firsthand.</p>
            </div>
            <div class="news_card">
                <p class="sub_title">Math Contest Winners</p>
                <p>Congratulations to our students for winning the 2024 inter-school math contest.</p>
            </div>
        </div>
    </section>

    <section class="CTA">
        <div class="container">
            <p class="title">Take the First Step Towards Excellence</p>
            <p>Contact us today to learn more about our programs or schedule a tour of our campus.</p>
            <div class="buttons">
                <a href="{{ route('contact') }}" class="btn_cta">Contact Us</a>
                <a href="#" class="btn_cta">Schedule a Tour</a>
            </div>
        </div>
    </section> --}}

    <x-slot name="javascript">
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const counters = document.querySelectorAll(".number");

                const animateCounter = (counter) => {
                    const target = +counter.getAttribute("data-target");
                    const speed = 400;
                    let count = 0;

                    const updateCounter = () => {
                        const increment = target / speed;
                        if (count < target) {
                            count += increment;
                            counter.textContent = Math.ceil(count);
                            setTimeout(updateCounter, 1);
                        } else {
                            counter.textContent = target;
                        }
                    };

                    updateCounter();
                };

                const observerOptions = {
                    root: null, // Observe within the viewport
                    threshold: 0.8, // Trigger when 10% of the section is visible
                };

                const observer = new IntersectionObserver((entries, observer) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            const statsSection = entry.target;
                            const countersInSection = statsSection.querySelectorAll(".number");
                            
                            countersInSection.forEach((counter) => animateCounter(counter));
                            
                            // observer.unobserve(statsSection); // Stop observing once animation is triggered
                        }
                    });
                }, observerOptions);

                const statsSection = document.querySelector(".Statistics");
                observer.observe(statsSection);
            });
        </script>
    </x-slot>
</x-general-layout>
