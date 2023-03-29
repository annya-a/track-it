<?php

namespace App\Domain\Users\Actions;

use Illuminate\Support\Facades\Auth;

class UserLogoutAction
{
    public function execute($guard)
    {
        Auth::guard($guard)->logout();
    }
}
