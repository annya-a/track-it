<?php

namespace App\Domain\Projects\Policies;

use App\Domain\Users\Models\User;

class ProjectPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->company()->exists();
    }
}
