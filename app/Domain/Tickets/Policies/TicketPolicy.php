<?php

namespace App\Domain\Tickets\Policies;

use App\Domain\Users\Models\User;
use App\Domain\Tickets\Models\Ticket;

class TicketPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->projects()->exists();
    }
}
