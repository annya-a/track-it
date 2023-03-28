<?php

namespace App\Domain\Users\Tests;

use App\Domain\Users\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @group logout
 */
class LogoutTest extends TestCase
{
    use RefreshDatabase;

    /**
     * When user logouts he becomes a guest.
     */
    public function test_when_user_logouts_he_becomes_a_guest(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
        $response->assertRedirect('/');
    }

    /**
     * When guest tries to logout he is redirected to login page.
     */
    public function test_when_guest_tries_to_logout_he_is_redirected_to_login_page()
    {
        $response = $this->post('/logout');

        $response->assertRedirect('/login');
    }
}
