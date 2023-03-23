<?php

namespace App\Modules\Tickets\Policies;

use App\Modules\Users\Models\User;
use App\Modules\Tickets\Models\Ticket;

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
