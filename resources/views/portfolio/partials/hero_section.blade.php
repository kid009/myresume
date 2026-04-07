<section id="hero" class="hero section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-center">
            <div class="col-lg-6 order-2 order-lg-1">
                <div class="hero-content">
                    <h3 data-aos="fade-up" data-aos-delay="200">
                        Modern Web Developer (Laravel Stack)
                        {{-- <span class="accent-text">Quality Advocate</span> --}}
                    </h3>
                    <p class="hero-description" data-aos="fade-up" data-aos-delay="300">
                        {{ __('home.bio') }}
                    </p>
                    <div class="hero-actions" data-aos="fade-up" data-aos-delay="400">
                        <a href="#portfolio" class="btn-primary">{{__('home.btn_portfolio')}}</a>
                        <a href="#contact" class="btn-secondary">{{__('home.btn_contact')}}</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2">
                <div class="hero-image" data-aos="fade-up" data-aos-delay="300">
                    <div class="image-wrapper">
                        <img src="{{ asset('assets/img/profile/laravelstack.png') }}"
                            alt="Laravel Developer Profile" class="img-fluid main-image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
