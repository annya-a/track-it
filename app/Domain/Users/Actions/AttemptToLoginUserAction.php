<?php

namespace App\Domain\Users\Actions;

use App\Domain\Users\Auth\Login;
use App\Domain\Users\DataTransferObjects\UserLoginData;
use Illuminate\Support\Facades\Log;

class AttemptToLoginUserAction
{
    protected Login $login;

    public function __construct(Login $login)
    {
        $this->login = $login;
    }

    public function execute(UserLoginData $data)
    {
        $this->login->setUp($data);
        $this->login->authenticate();
    }
}
