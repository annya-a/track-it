<?php

namespace Domain\Tickets\Policies;

use Domain\Users\Models\User;

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
