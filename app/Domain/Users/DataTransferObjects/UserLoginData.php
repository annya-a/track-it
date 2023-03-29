<?php

namespace App\Domain\Users\DataTransferObjects;

use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;
use Symfony\Contracts\Service\Attribute\Required;

class UserLoginData extends Data
{
    public function __construct(
        #[Required, Email]
        public string $email,
        #[Required, StringType]
        public string $password,
        #[Required, StringType]
        public string $ip
    )
    {
    }
}
