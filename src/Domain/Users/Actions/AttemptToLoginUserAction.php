<?php

namespace Domain\Users\Actions;

use Domain\Users\Auth\Login;
use Domain\Users\DataTransferObjects\UserLoginData;

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
