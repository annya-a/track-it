<?php

namespace App\Modules\Projects\Database\Seeders;

use App\Modules\Projects\Models\Project;
use App\Modules\Tickets\Models\Ticket;
use App\Modules\Users\Models\User;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(100)
            ->create()
            ->each(function (User $user) {
                Project::factory()
                    ->count(mt_rand(1, 10))
                    ->has(Ticket::factory()->count(300))
                    ->for($user, 'owner')
                    ->create();
            });
    }
}
