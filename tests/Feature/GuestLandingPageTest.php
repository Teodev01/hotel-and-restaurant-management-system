<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class GuestLandingPageTest extends TestCase
{
    public function test_landing_page_displays_sample_menu_and_stay_details(): void
    {
        $response = $this->get('/');

        $response->assertOk()
            ->assertSee('Create a guest account <span aria-hidden="true">↗</span>', false)
            ->assertSee('House steak frites')
            ->assertSee('Chocolate lava cake')
            ->assertSee('₱1,450')
            ->assertSee('₱3,500')
            ->assertSee('2:00 PM')
            ->assertSee('12:00 noon')
            ->assertSee('planning examples only');
    }

    public function test_landing_page_hides_guest_account_cta_for_authenticated_guests(): void
    {
        $user = User::factory()->make(['role' => 'guest']);

        $response = $this->actingAs($user)->get('/');

        $response->assertOk()
            ->assertDontSee('Create a guest account <span aria-hidden="true">↗</span>', false);
    }

    public function test_landing_page_uses_https_assets_when_request_is_forwarded_over_https(): void
    {
        $response = $this->withHeader('X-Forwarded-Proto', 'https')
            ->get('/');

        $response->assertOk();

        preg_match('/<link rel="stylesheet" href="([^"]*landing\.css)"/', $response->getContent(), $matches);

        $this->assertSame('https://localhost:8000/css/landing.css', $matches[1] ?? null);
    }
}
