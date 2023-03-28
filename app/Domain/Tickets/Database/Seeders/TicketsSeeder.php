<?php

namespace App\Domain\Tickets\Database\Seeders;

use App\Domain\Tickets\Models\Ticket;
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
