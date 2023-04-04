<?php

namespace Domain\Companies\Policies;

use Domain\Users\Models\User;

class CompanyPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->company()->doesntExist();
    }
}
