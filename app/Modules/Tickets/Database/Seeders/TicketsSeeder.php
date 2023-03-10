<?php

namespace App\Modules\Tickets\Database\Seeders;

use App\Modules\Tickets\Models\Ticket;
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
