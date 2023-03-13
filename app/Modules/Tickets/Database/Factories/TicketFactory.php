<?php

namespace App\Modules\Tickets\Database\Factories;

use App\Modules\Tickets\Enums\TicketStatus;
use App\Modules\Tickets\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Modules\Tickets\Models\Ticket>
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
                TicketStatus::NEW,
                TicketStatus::IN_PROGRESS,
                TicketStatus::ASSIGNED,
                TicketStatus::PENDING,
                TicketStatus::RESOLVED
            ]),
            'created_at' => $this->faker->dateTimeBetween('-1 year'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year'),
        ];
    }
}
