<section id="resume" class="resume section">
    <div class="container section-title text-center" data-aos="fade-up">
        <h2>{{ __('resume.page_title') }}</h2>
        <p class="mb-4 text-white">{{ __('resume.summary_desc') }}</p>
        
        <a href="{{ asset('assets/docs/resume_laravel.pdf') }}" target="_blank" class="btn btn-primary btn-lg rounded-pill px-4 py-2 mt-3 shadow-sm">
            <i class="bi bi-file-earmark-pdf-fill me-2"></i> {{ __('resume.btn_download') }}
        </a>
    </div>

    <div class="container mt-5" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-start">
            
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                <div class="professional-journey">
                    <div class="section-intro mb-4">
                        <div class="icon-wrapper">
                            <i class="bi bi-briefcase-fill"></i>
                        </div>
                        <h3 class="fw-bold">{{ __('resume.experience_title') }}</h3>
                    </div>
                    
                    <div class="experience-timeline">
                        <div class="timeline-item pb-4 border-start border-primary border-2 ps-4 position-relative">
                            <div class="position-absolute top-0 start-0 translate-middle bg-primary rounded-circle" style="width: 15px; height: 15px;"></div>
                            <span class="text-primary fw-bold">{{ __('resume.exp_freelance_year') }}</span>
                            <h4 class="mt-2 mb-1 fw-bold">{{ __('resume.exp_freelance_title') }}</h4>
                            <p class="text-white small">Full-Stack Development (Laravel & Livewire), POS Systems & Web Applications.</p>
                        </div>

                        <div class="timeline-item pb-4 border-start border-primary border-2 ps-4 position-relative">
                            <div class="position-absolute top-0 start-0 translate-middle bg-secondary rounded-circle" style="width: 15px; height: 15px;"></div>
                            <span class="text-primary fw-bold" >{{ __('resume.exp_bluebox_year') }}</span>
                            <h4 class="mt-2 mb-1 fw-bold">{{ __('resume.exp_bluebox_title') }}</h4>
                            <h6 class="text-white">{{ __('resume.exp_bluebox_company') }}</h6>
                            <p class="text-white small">ASP.NET, C#, MSSQL for Regulatory Data Management.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <div class="education-skills">
                    <div class="section-intro mb-4">
                        <div class="icon-wrapper">
                            <i class="bi bi-lightning-charge-fill"></i>
                        </div>
                        <h3 class="fw-bold">{{ __('resume.skills_title') }}</h3>
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="p-3 border rounded shadow-sm bg-dark text-white">
                                <i class="bi bi-braces fs-4 text-primary mb-2 d-block"></i>
                                <h6 class="fw-bold">Backend & Database</h6>
                                <p class="small text-white mb-0">Laravel, Oracle DB, MySQL, RESTful API</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 border rounded shadow-sm bg-dark text-white">
                                <i class="bi bi-window-sidebar fs-4 text-primary mb-2 d-block"></i>
                                <h6 class="fw-bold">Frontend</h6>
                                <p class="small text-white mb-0">Livewire, JavaScript, Bootstrap, HTML/CSS</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 border rounded shadow-sm bg-dark text-white">
                                <i class="bi bi-tools fs-4 text-primary mb-2 d-block"></i>
                                <h6 class="fw-bold">Tools & DevOps</h6>
                                <p class="small text-white mb-0">Docker, Git, Postman</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 border rounded shadow-sm bg-dark text-white">
                                <i class="bi bi-briefcase fs-4 text-primary mb-2 d-block"></i>
                                <h6 class="fw-bold">Business Logic</h6>
                                <p class="small text-white mb-0">ERP Systems, POS, Inventory Management</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>