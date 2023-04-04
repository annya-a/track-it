<?php

namespace Domain\Users\Tests;

use Domain\Users\Models\User;
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

    /**
     * Guest sends wrong data when is trying to register.
     *
     * @param array $data
     *
     * @dataProvider dataWhichCauseErrorsOnRegistration
     */
    public function test_guest_sends_wrong_data_when_is_trying_to_register(array $data)
    {
        $response = $this->post('/register', [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'password_confirmation' => $data['password_confirmation'],
            'policy' => $data['policy'],
        ]);

        $response->assertInvalid($data['errors']);
        $this->assertGuest();
    }

    /**
     * User tries to register with email which is already in database.
     */
    public function test_user_tries_to_register_with_email_which_is_already_in_database()
    {
        User::factory(['email' => 'john.doe@example.com'])->create();

        $response = $this->post('/register', [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'policy' => 1,
        ]);

        $response->assertInvalid(['email']);
        $this->assertGuest();
    }

    /**
     * Guest enters correct credentials and finishes registration.
     */
    public function test_guest_enters_correct_credentials_and_finishes_registration()
    {
        $response = $this->post('register', [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
            'policy' => 1,
        ]);

        $user = User::where('email', 'john.doe@example.com')->first();
        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
    }

    /**
     * Wrong data for registration testing to cause validation error.
     *
     * @return array
     */
    private function dataWhichCauseErrorsOnRegistration(): array
    {
        return [
            [[
                'name' => '',
                'email' => '',
                'password' => '',
                'password_confirmation' => '',
                'policy' => '',
                'errors' => ['name', 'email', 'password', 'policy']
            ]],
            [[
                'name' => 'John Doe',
                'email' => 'not-valid-email',
                'password' => 'password',
                'password_confirmation' => 'password',
                'policy' => 1,
                'errors' => ['email']
            ]],
            [[
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'password' => '123',
                'password_confirmation' => '123',
                'policy' => 1,
                'errors' => ['password']
            ]],
            [[
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'password' => 'password',
                'password_confirmation' => 'password',
                'policy' => 0,
                'errors' => ['policy']
            ]],
            [[
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'password' => 'password',
                'password_confirmation' => 'password mismatch',
                'policy' => 1,
                'errors' => ['password']
            ]]
        ];
    }
}
