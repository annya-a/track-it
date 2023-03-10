<?php

namespace Database\Seeders;

use App\Modules\Tickets\Database\Seeders\TicketsSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(TicketsSeeder::class);
    }
}
