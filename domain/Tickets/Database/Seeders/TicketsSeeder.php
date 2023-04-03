<?php

namespace Domain\Tickets\Database\Seeders;

use Domain\Tickets\Models\Ticket;
use Illuminate\Database\Seeder;

class TicketsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ticket::factory()->count(1000)->create();
    }
}
