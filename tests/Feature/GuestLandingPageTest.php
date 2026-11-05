<?php

namespace Tests\Feature;

use Tests\TestCase;

class GuestLandingPageTest extends TestCase
{
    public function test_landing_page_displays_sample_menu_and_stay_details(): void
    {
        $response = $this->get('/');

        $response->assertOk()
            ->assertSee('House steak frites')
            ->assertSee('Chocolate lava cake')
            ->assertSee('₱1,450')
            ->assertSee('₱3,500')
            ->assertSee('2:00 PM')
            ->assertSee('12:00 noon')
            ->assertSee('planning examples only');
    }
}
