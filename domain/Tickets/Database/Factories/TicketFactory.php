<?php

namespace Domain\Tickets\Database\Factories;

use Domain\Tickets\Enums\TicketStatus;
use Domain\Tickets\Models\Ticket;
use Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Domain\Tickets\Models\Ticket>
 */
class TicketFactory extends Factory
{
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => Str::replace('.', '', $this->faker->sentence),
            'status' => $this->faker->randomElement([
                TicketStatus::new(),
                TicketStatus::in_progress(),
                TicketStatus::assigned(),
                TicketStatus::pending(),
                TicketStatus::resolved(),
            ]),
            'creator_id' => User::factory(),
            'created_at' => $this->faker->dateTimeBetween('-1 year'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year'),
        ];
    }
}
