<?php

namespace App\Modules\Users\Tests;

use App\Modules\Users\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @group register
 */
class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Guest sees register page.
     *
     * @return void
     */
    public function test_guest_sees_register_page(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    /**
     * When authenticated user visits register page he is redirected to home page.
     *
     * @return void
     */
    public function test_when_authenticated_user_visits_register_page_he_is_redirected_to_home_page(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/register');

        $response->assertRedirect('/');
    }
}
