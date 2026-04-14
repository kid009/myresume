<?php

namespace Tests\Feature;

use Tests\TestCase;

class PortfolioTest extends TestCase
{
    public function test_home_page_returns_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_home_page_contains_view_data(): void
    {
        $response = $this->get('/');

        $response->assertViewHas('homeData');
        $response->assertViewHas('getProjects');
    }

    public function test_home_page_uses_correct_view(): void
    {
        $response = $this->get('/');

        $response->assertViewIs('portfolio.index');
    }

    public function test_home_page_contains_section_ids(): void
    {
        $response = $this->get('/');

        $response->assertSee('id="hero"', false);
        $response->assertSee('id="about"', false);
        $response->assertSee('id="resume"', false);
        $response->assertSee('id="portfolio"', false);
        $response->assertSee('id="services"', false);
        $response->assertSee('id="contact"', false);
    }

    public function test_home_page_contains_navigation(): void
    {
        $response = $this->get('/');

        $response->assertSee('id="navmenu"', false);
    }

    public function test_home_page_contains_language_switcher(): void
    {
        $response = $this->get('/');

        $response->assertSee('language-switcher');
        $response->assertSee(route('lang.switch', 'en'));
        $response->assertSee(route('lang.switch', 'th'));
    }
}
