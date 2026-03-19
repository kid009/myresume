<section id="portfolio" class="portfolio section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Portfolio</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
            consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit
            in iste officiis commodi quidem hic quas.</p>
    </div>
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
            <div class="filters-wrapper" data-aos="fade-up" data-aos-delay="200">
                <ul class="portfolio-filters isotope-filters">
                    <li data-filter="*" class="filter-active">All Work</li>
                    <li data-filter=".filter-branding">Branding</li>
                    <li data-filter=".filter-web">Web Design</li>
                    <li data-filter=".filter-photography">Photography</li>
                    <li data-filter=".filter-print">Print Design</li>
                </ul>
            </div>
            <div class="row gy-5 portfolio-container isotope-container" data-aos="fade-up" data-aos-delay="300">
                <div class="col-lg-6 portfolio-item isotope-item filter-branding">
                    <div class="portfolio-card">
                        <div class="portfolio-image">
                            <img src="{{ asset('assets/img/portfolio/portfolio-3.webp') }}" class="img-fluid"
                                alt="Brand Identity Project" loading="lazy">
                            <div class="portfolio-overlay">
                                <div class="portfolio-actions">
                                    <a href="{{ asset('assets/img/portfolio/portfolio-3.webp') }}"
                                        class="glightbox action-btn preview-btn" title="Elemental Branding"><i
                                            class="bi bi-eye"></i></a>
                                    <a href="portfolio-details.html" class="action-btn details-btn"
                                        title="View Project"><i class="bi bi-arrow-up-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-content">
                            <div class="portfolio-meta">
                                <span class="portfolio-category">Brand Identity</span>
                                <span class="portfolio-year">2024</span>
                            </div>
                            <h3 class="portfolio-title">Elemental Branding</h3>
                            <p class="portfolio-description">Comprehensive brand identity design focusing on natural
                                elements and sustainable business practices.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 portfolio-item isotope-item filter-web">
                    <div class="portfolio-card">
                        <div class="portfolio-image">
                            <img src="{{ asset('assets/img/portfolio/portfolio-7.webp') }}" class="img-fluid"
                                alt="Digital Platform" loading="lazy">
                            <div class="portfolio-overlay">
                                <div class="portfolio-actions">
                                    <a href="{{ asset('assets/img/portfolio/portfolio-7.webp') }}"
                                        class="glightbox action-btn preview-btn" title="Digital Workspace"><i
                                            class="bi bi-eye"></i></a>
                                    <a href="portfolio-details.html" class="action-btn details-btn"
                                        title="View Project"><i class="bi bi-arrow-up-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-content">
                            <div class="portfolio-meta">
                                <span class="portfolio-category">Web Application</span>
                                <span class="portfolio-year">2024</span>
                            </div>
                            <h3 class="portfolio-title">Digital Workspace</h3>
                            <p class="portfolio-description">Modern web application designed for remote collaboration
                                with intuitive user experience and clean aesthetics.</p>
                        </div>
                    </div>
                </div>
                <!-- More Portfolio Items... -->
            </div>
        </div>
    </div>
</section>
