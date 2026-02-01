<section id="hero" class="hero section light-background">

    <img src="{{ $info && $info->hero_image ? asset('storage/' . $info->hero_image) : asset('assets/img/hero-bg.jpg') }}"
        alt="Hero Background" class="object-fit-cover">

    <div class="container" data-aos="zoom-out">
        <div class="row justify-content-center">
            <div class="col-lg-9">

                <h2>{{ $info->full_name ?? 'Default Name' }}</h2>

                <p> I'm <span class="typed"
                        data-typed-items="{{ $info->profile_title ?? 'Developer, Freelancer' }}"></span>
                    <span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span>
                </p>

                <div class="social-links">
                    @if (!empty($info->social_links['facebook']))
                        <a href="{{ $info->social_links['facebook'] }}" target="_blank" rel="noopener noreferrer">
                            <i class="bi bi-facebook"></i>
                        </a>
                    @endif

                    @if (!empty($info->social_links['linkedin']))
                        <a href="{{ $info->social_links['linkedin'] }}" target="_blank" rel="noopener noreferrer">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    @endif

                    @if (!empty($info->social_links['github']))
                        <a href="{{ $info->social_links['github'] }}" target="_blank" rel="noopener noreferrer">
                            <i class="bi bi-github"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

</section>
