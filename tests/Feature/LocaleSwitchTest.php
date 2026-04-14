<?php

namespace Tests\Feature;

use Tests\TestCase;

class LocaleSwitchTest extends TestCase
{
    public function test_switch_to_thai_sets_session_and_redirects_back(): void
    {
        $response = $this->from('/')->get('/lang/th');

        $response->assertRedirect('/');
        $this->assertEquals('th', session('locale'));
    }

    public function test_switch_to_english_sets_session_and_redirects_back(): void
    {
        $response = $this->from('/')->get('/lang/en');

        $response->assertRedirect('/');
        $this->assertEquals('en', session('locale'));
    }

    public function test_switch_to_invalid_locale_does_not_set_session(): void
    {
        $response = $this->from('/')->get('/lang/fr');

        $response->assertRedirect('/');
        $this->assertNull(session('locale'));
    }

    public function test_set_locale_middleware_applies_session_locale(): void
    {
        $this->withSession(['locale' => 'th'])->get('/');

        $this->assertEquals('th', app()->getLocale());
    }

    public function test_set_locale_middleware_defaults_to_config_locale(): void
    {
        $this->get('/');

        $this->assertEquals(config('app.locale'), app()->getLocale());
    }
}
