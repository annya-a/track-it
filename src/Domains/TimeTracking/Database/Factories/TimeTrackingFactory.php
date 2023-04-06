<?php

namespace Domain\TimeTracking\Database\Factories;

use Domain\Tickets\Models\Ticket;
use Domain\TimeTracking\Models\TimeTracking;
use Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Domain\TimeTrack\Models\TimeTracking>
 */
class TimeTrackingFactory extends Factory
{
    protected $model = TimeTracking::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'started_at' => $this->faker->dateTimeBetween('-1 year'),
            'ended_at' => $this->faker->dateTimeBetween('-1 year'),
            'creator_id' => User::factory(),
            'ticket_id' => Ticket::factory(),
            'description' => $this->faker->sentence,
            'created_at' => $this->faker->dateTimeBetween('-1 year'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year'),
        ];
    }
}
