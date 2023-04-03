<?php

namespace Domain\Users\Tests;

use Domain\Users\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

/**
 * @group login
 */
class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * When guest visits home page he is redirected to login page.
     *
     * @return void
     */
    public function test_when_guest_visits_home_page_he_is_redirected_to_login_page(): void
    {
        $response = $this->get('/');

        $response->assertRedirect('/login');
    }

    /**
     * Guest sees login page.
     *
     * @return void
     */
    public function test_guest_sees_login_page(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    /**
     * When authenticated user visits login page he is redirected to home page.
     *
     * @return void
     */
    public function test_when_authenticated_user_visits_login_page_he_is_redirected_to_home_page(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect('/');
    }

    /**
     * Guest sends wrong data when is trying to log in.
     *
     * @param array $data
     *
     * @dataProvider dataWhichCauseErrorsOnLogin
     */
    public function test_guest_sends_wrong_data_when_is_trying_to_login(array $data)
    {
        $response = $this->post('/login', ['email' => $data['email'], 'password' => $data['password']]);

        $response->assertInvalid(array_keys($data));
        $this->assertGuest();
    }

    /**
     * Guest enters correct credentials and logs in.
     */
    public function test_guest_enters_correct_credentials_and_logs_in()
    {
        $user = User::factory(['password' => Hash::make('secret123')])->create();

        $response = $this->post('login', ['email' => $user->email, 'password' => 'secret123']);
        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
    }

    /**
     * Guest enters incorrect credentials and doesn't log in.
     *
     * @dataProvider dataWithWrongCredentials
     */
    public function test_guest_enters_incorrect_credentials_and_doesnt_log_in(array $data)
    {
        User::factory(['email' => 'john.doe@example.com', 'password' => Hash::make('secret123')])->create();

        $response = $this->post('login', ['email' => $data['email'], 'password' => $data['password']]);
        $response->assertSessionHasErrors();
        $this->assertGuest();
    }

    /**
     * Wrong data for login testing to cause validation error.
     *
     * @return array
     */
    private function dataWhichCauseErrorsOnLogin(): array
    {
        return [
            [['email' => '', 'password' => '']],
            [['email' => 'not-valid-email', 'password' => '']],
        ];
    }

    /**
     * Data with wrong credentials.
     *
     * @return array
     */
    private function dataWithWrongCredentials()
    {
        return [
            [['email' => 'wrong.email@example.com', 'password' => 'secret123']],
            [['email' => 'john.doe@example.com', 'password' => 'wrong.password']]
        ];
    }
}
