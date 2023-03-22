<?php

namespace App\Modules\Projects\Policies;

use App\Modules\Users\Models\User;

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
