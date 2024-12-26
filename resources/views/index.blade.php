<x-general-layout class="Homepage">
    <section class="Hero">
        <div class="container">
            <p class="sub_title">Choose the Best</p>
            <p class="title">Education for your Future</p>

            <div class="button">
                <a href="{{ route('login') }}">Login</a>
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
                    <p>Our school libraries are the foundation of our culture. Not luxuries.</p>
                </div>
            </div>

            <div class="about_card">
                <div class="icon">
                    <i class="fa fa-bong"></i>
                </div>

                <div class="text">
                    <p class="title">Laboratories</p>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quisquam exercitationem laudantium
                        assumenda voluptatum in molestias.</p>
                </div>
            </div>

            <div class="about_card">
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>

                <div class="text">
                    <p class="title">Expert Teachers</p>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quisquam exercitationem laudantium
                        assumenda voluptatum in molestias.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="Mission_vission">
        <div class="container">
            <p class="container_title">Why Choose Us?</p>
            <div class="content">
                <div class="image">
                    <img src="{{ asset('assets/images/Hero.webp') }}" alt="Mission / Vission">
                </div>

                <div class="text">
                    <div class="statement">
                        <p class="title">Our Mission</p>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maxime non minus repellendus nihil
                            natus assumenda. Rerum molestias quam blanditiis dolorem in? Dolorem corporis praesentium
                            excepturi debitis ratione consectetur iste voluptate?</p>
                    </div>

                    <div class="statement">
                        <p class="title">Our Mission</p>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maxime non minus repellendus nihil
                            natus assumenda. Rerum molestias quam blanditiis dolorem in? Dolorem corporis praesentium
                            excepturi debitis ratione consectetur iste voluptate?</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="Statistics">
        <div class="container">
            <div class="stat">
                <p class="number">8000+</p>
                <p class="text">Students</p>
            </div>

            <div class="stat">
                <p class="number">80</p>
                <p class="text">Teachers</p>
            </div>

            <div class="stat">
                <p class="number">14+</p>
                <p class="text">Subjects</p>
            </div>
        </div>
    </section>
</x-general-layout>
