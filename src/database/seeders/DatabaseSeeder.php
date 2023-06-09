<?php

namespace Database\Seeders;

use Domain\Projects\Database\Seeders\ProjectSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ProjectSeeder::class);
    }
}
