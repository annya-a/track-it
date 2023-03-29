<?php

namespace App\Domain\Users\Actions;

use App\Domain\Users\DataTransferObjects\UserData;
use App\Domain\Users\Models\User;
use Illuminate\Support\Facades\Auth;

class UserLoginAction
{
    public function execute(UserData $data)
    {
        Auth::login(User::find($data->id));
    }
}
