<section id="about" class="about section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="intro-header text-center" data-aos="fade-up" data-aos-delay="150">
                    <h1>{{__("home.title")}}</h1>
                    <p class="subtitle">{{__("home.sub_title")}}</p>
                </div>
                <div class="main-content-wrapper">
                    <div class="row align-items-start">
                        <div class="col-lg-4" data-aos="fade-right" data-aos-delay="200">
                            <div class="profile-section">
                                <div class="profile-image-container">
                                    <img src="{{ asset('assets/img/profile/profile-square-15.webp') }}"
                                        class="img-fluid" alt="Profile Picture">
                                </div>
                                <div class="profile-meta">
                                    <div class="location">
                                        <i class="bi bi-geo-alt"></i>
                                        <span>{{__('home.about_localtion')}}</span>
                                    </div>
                                    <div class="status">
                                        <div class="status-indicator"></div>
                                        <span>{{__('home.about_status')}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8" data-aos="fade-left" data-aos-delay="250">
                            <div class="content-area">
                                <div class="story-block">
                                    <p class="lead-text">{{__("home.paragraph_1")}}</p>
                                    <p>{{__("home.paragraph_2")}}</p>
                                </div>
                                <div class="expertise-grid">
                                    <div class="expertise-item" data-aos="zoom-in" data-aos-delay="300">
                                        <div class="expertise-icon">
                                            <i class="bi bi-code-slash"></i>
                                        </div>
                                        <div class="expertise-content">
                                            <h4>{{__("home.skill_box_1")}}</h4>
                                        </div>
                                    </div>
                                    <div class="expertise-item" data-aos="zoom-in" data-aos-delay="350">
                                        <div class="expertise-icon">
                                            <i class="bi bi-shield-check"></i>
                                        </div>
                                        <div class="expertise-content">
                                            <h4>{{__("home.skill_box_2")}}</h4>
                                        </div>
                                    </div>
                                    <div class="expertise-item" data-aos="zoom-in" data-aos-delay="400">
                                        <div class="expertise-icon">
                                            <i class="bi bi-database"></i>
                                        </div>
                                        <div class="expertise-content">
                                            <h4>{{__("home.skill_box_3")}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom-section" data-aos="fade-up" data-aos-delay="500">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="collaboration-text">
                                <h3>Let's build a robust system together</h3>
                                <p>Whether you need a new RESTful API, a complete backend system, or want to refactor and write tests for an existing Laravel application, I'm ready to help.</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="action-buttons">
                                <a href="#portfolio" class="btn-custom primary">View My Projects</a>
                                <a href="#contact" class="btn-custom secondary">Discuss Your Project</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
