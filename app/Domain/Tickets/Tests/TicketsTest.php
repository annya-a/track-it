<?php

namespace App\Domain\Tickets\Tests;

use App\Domain\Companies\Models\Company;
use App\Domain\Projects\Models\Project;
use App\Domain\Tickets\Models\Ticket;
use App\Domain\Users\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @group tickets
 */
class TicketsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Ticket is in database after creation.
     */
    public function test_ticket_is_in_database_after_creation(): void
    {
        $ticket = Ticket::factory()
            ->for(Project::factory())
            ->create();

        $this->assertModelExists($ticket);
    }

    /**
     * When guest request tickets page he is redirected to login page.
     */
    public function test_when_guest_requests_tickets_page_he_is_redirected_to_login_page(): void
    {
        $response = $this->get('/tickets');
        $response->assertRedirect('login');
    }

    /**
     * Ticket is visible on tickets page.
     */
    public function test_ticket_is_visible_on_tickets_page(): void
    {
        $company = Company::factory()->create();
        $user = User::factory()
            ->for($company)
            ->create();

        $ticket = Ticket::factory()
            ->for(Project::factory()
                ->for($user, 'creator')
                ->for($company)
            )
            ->create();

        $response = $this->actingAs($user)->get('/tickets');
        $response->assertStatus(200);
        $response->assertSee($ticket->title);
    }

    /**
     * Pager is visible on tickets page.
     */
    public function test_pager_is_visible_on_tickets_page(): void
    {

        $company = Company::factory()->create();
        $user = User::factory()
            ->for($company)
            ->create();

        Ticket::factory()
            ->count(16)
            ->for(Project::factory()
                ->for($user, 'creator')
                ->for($company)
            )
            ->create();

        $response = $this->actingAs($user)->get('/tickets');
        $response->assertStatus(200);
        $response->assertSee('Next');
    }

    /**
     * Pager is not visible on tickets page.
     */
    public function test_pager_is_not_visible_on_tickets_page(): void
    {
        $company = Company::factory()->create();
        $user = User::factory()
            ->for($company)
            ->create();

        Ticket::factory()
            ->count(15)
            ->for(Project::factory()
                ->for($user, 'creator')
                ->for($company)
            )
            ->create();

        $response = $this->actingAs($user)->get('/tickets');
        $response->assertStatus(200);
        $response->assertDontSee('Next');
    }
}
