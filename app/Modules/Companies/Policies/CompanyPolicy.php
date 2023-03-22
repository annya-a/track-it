<?php

namespace App\Modules\Companies\Policies;

use App\Company;
use App\Modules\Users\Models\User;

class CompanyPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return !$user->company()->exists();
    }
}
