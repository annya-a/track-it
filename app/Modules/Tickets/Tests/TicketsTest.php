<?php

namespace App\Modules\Tickets\Tests;

use App\Modules\Tickets\Models\Ticket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TicketsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_create_ticket(): void
    {
        $ticket = new Ticket();
        $ticket->title = 'Ticket #1';
        $ticket->save();

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Ticket #1');
    }
}
