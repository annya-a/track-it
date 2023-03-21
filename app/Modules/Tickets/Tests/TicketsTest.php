<?php

namespace App\Modules\Tickets\Tests;

use App\Modules\Projects\Models\Project;
use App\Modules\Tickets\Models\Ticket;
use App\Modules\Users\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @group tickets
 */
class TicketsTest extends TestCase
{
    use RefreshDatabase;

    public function test_ticket_is_in_database_after_creation(): void
    {
        $ticket = Ticket::factory()
            ->for(Project::factory())
            ->create();

        $this->assertModelExists($ticket);
    }

    public function test_when_guest_requests_tickets_page_he_is_redirected_to_login_page(): void
    {
        $response = $this->get('/tickets');
        $response->assertRedirect('login');
    }

    public function test_ticket_is_visible_on_main_page(): void
    {
        $user = User::factory()->create();

        $ticket = Ticket::factory()
            ->for(Project::factory())
            ->create();

        $response = $this->actingAs($user)->get('/');
        $response->assertStatus(200);
        $response->assertSee($ticket->title);
    }

    public function test_pager_is_visible_on_tickets_page(): void
    {
        $user = User::factory()->create();

        Ticket::factory()
            ->count(16)
            ->for(Project::factory())
            ->create();

        $response = $this->actingAs($user)->get('/tickets');
        $response->assertStatus(200);
        $response->assertSee('Next');
    }


    public function test_pager_is_not_visible_on_tickets_page(): void
    {
        $user = User::factory()->create();

        Ticket::factory()
            ->count(15)
            ->for(Project::factory())
            ->create();

        $response = $this->actingAs($user)->get('/');
        $response->assertStatus(200);
        $response->assertDontSee('Next');
    }
}
