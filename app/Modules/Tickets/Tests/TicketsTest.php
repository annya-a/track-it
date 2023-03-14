<?php

namespace App\Modules\Tickets\Tests;

use App\Modules\Projects\Models\Project;
use App\Modules\Tickets\Models\Ticket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

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

    public function test_ticket_is_visible_on_main_page(): void
    {
        $ticket = Ticket::factory()
            ->for(Project::factory())
            ->create();

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee($ticket->title);
    }

    public function test_pager_is_visible_on_main_page(): void
    {
        Ticket::factory()
            ->count(16)
            ->for(Project::factory())
            ->create();

        $response = $this->get('/');
        $response->assertSee('Next');
    }


    public function test_pager_is_not_visible_on_main_page(): void
    {
        Ticket::factory()
            ->count(15)
            ->for(Project::factory())
            ->create();

        $response = $this->get('/');
        $response->assertDontSee('Next');
    }
}
