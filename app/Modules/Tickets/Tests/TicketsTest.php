<?php

namespace App\Modules\Tickets\Tests;

use App\Modules\Tickets\Models\Ticket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TicketsTest extends TestCase
{
    use RefreshDatabase;

    public function test_ticket_is_in_database_after_creation(): void
    {
        $ticket = Ticket::factory()->create();

        $this->assertModelExists($ticket);
    }

    public function test_ticket_is_visible_on_main_page(): void
    {
        Ticket::factory(['title' => 'Ticket #1'])->create();

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Ticket #1');
    }

    public function test_pager_is_visible_on_main_page(): void
    {
        Ticket::factory()->count(16)->create();

        $response = $this->get('/');
        $response->assertSee('Next');
    }


    public function test_pager_is_not_visible_on_main_page(): void
    {
        Ticket::factory()->count(15)->create();

        $response = $this->get('/');
        $response->assertDontSee('Next');
    }
}
