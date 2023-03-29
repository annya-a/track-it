<?php

namespace App\Domain\Users\Actions;

use App\Domain\Users\DataTransferObjects\UserData;
use App\Domain\Users\DataTransferObjects\UserStoreData;
use App\Domain\Users\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class CreateUserAction
{
    public function execute(UserStoreData $data): UserData
    {
        $user = new User;
        $user->name = $data->name;
        $user->email = $data->email;
        $user->password = Hash::make($data->password);
        $user->save();

        event(new Registered($user));

        return UserData::from($user);
    }
}
