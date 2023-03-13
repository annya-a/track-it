<?php

namespace App\Modules\Projects\Database\Seeders;

use App\Modules\Projects\Models\Project;
use App\Modules\Tickets\Models\Ticket;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::factory()
            ->count(100)
            ->has(Ticket::factory()->count(300))
            ->create();
    }
}
