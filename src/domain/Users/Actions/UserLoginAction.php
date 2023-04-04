<?php

namespace Domain\Users\Actions;

use Domain\Users\DataTransferObjects\UserData;
use Domain\Users\Models\User;
use Illuminate\Support\Facades\Auth;

class UserLoginAction
{
    public function execute(UserData $data)
    {
        Auth::login(User::find($data->id));
    }
}
