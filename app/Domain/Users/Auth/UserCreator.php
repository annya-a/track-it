<?php

namespace App\Domain\Users\Auth;

use App\Domain\Users\DataTransferObjects\UserStoreData;
use App\Domain\Users\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserCreator
{
    public function create(UserStoreData $data)
    {
        $user = new User;
        $user->name = $data->name;
        $user->email = $data->email;
        $user->password = Hash::make($data->password);
        $user->save();

        event(new Registered($user));

        Auth::login($user);
    }
}
