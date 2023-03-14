<?php

namespace App\Modules\Users\Auth;

use App\Modules\Users\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserCreate
{
    public function create(string $email, string $password)
    {
        $user = new User;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->save();

        event(new Registered($user));

        Auth::login($user);
    }
}
