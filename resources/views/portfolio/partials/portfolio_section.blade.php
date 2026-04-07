<section id="portfolio" class="portfolio section">
    
    <div class="container section-title" data-aos="fade-up">
        <h2>{{ __('portfolio.title') }}</h2>
        <p class="text-white-50">{{ __('portfolio.subtitle') }}</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
            
            <div class="filters-wrapper mb-5" data-aos="fade-up" data-aos-delay="200">
                <ul class="portfolio-filters isotope-filters">
                    <li data-filter="*" class="filter-active">{{ __('portfolio.filter_all') }}</li>
                    <li data-filter=".filter-web">{{ __('portfolio.filter_web') }}</li>
                    <li data-filter=".filter-pos">{{ __('portfolio.filter_pos') }}</li>
                </ul>
            </div>

            <div class="row gy-4 portfolio-container isotope-container" data-aos="fade-up" data-aos-delay="300">
                
                @foreach(\App\DTOs\PortfolioDto::getProjects() as $project)
                <div class="col-lg-6 portfolio-item isotope-item filter-{{ $project->category }}">
                    <div class="card h-100 bg-transparent border border-secondary p-4 rounded-3 hover-effect">
                        
                        <div class="mb-4">
                            @foreach($project->tags as $tag)
                                <span class="badge bg-success bg-opacity-10 text-success border border-success me-2 px-3 py-2 fs-6 mb-2 font-monospace">
                                    {{ $tag }}
                                </span>
                            @endforeach
                        </div>
                        
                        <h3 class="text-white fw-bold mb-3">{{ __('portfolio.'.$project->id.'_title') }}</h3>
                        <p class="text-white-50 mb-4" style="line-height: 1.7;">
                            {{ __('portfolio.'.$project->id.'_desc') }}
                        </p>
                        
                        <div class="mt-auto pt-3 border-top border-secondary">
                            @if($project->github_url && $project->github_url !== '#')
                                <a href="{{ $project->github_url }}" target="_blank" class="text-success text-decoration-none fw-bold font-monospace d-inline-flex align-items-center">
                                    <i class="bi bi-github fs-5 me-2"></i> {{ $project->github_url }}
                                </a>
                            @else
                                <span class="text-secondary font-monospace d-inline-flex align-items-center">
                                    <i class="bi bi-lock-fill fs-5 me-2"></i> Private Repository (Commercial)
                                </span>
                            @endif
                        </div>

                    </div>
                </div>
                @endforeach
                
            </div></div>
    </div>
</section>

<style>
    .hover-effect {
        transition: all 0.3s ease;
    }
    .hover-effect:hover {
        border-color: #198754 !important; /* สีเขียว success */
        background-color: rgba(25, 135, 84, 0.05) !important;
        transform: translateY(-5px);
    }
</style>