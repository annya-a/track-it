<?php

namespace Domain\Projects\Database\Seeders;

use Domain\Projects\Models\Project;
use Domain\Tickets\Models\Ticket;
use Domain\Users\Models\User;
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
                    ->has(Ticket::factory()
                        ->for($user, 'creator')
                        ->count(300))
                    ->for($user, 'creator')
                    ->create();
            });
    }
}
