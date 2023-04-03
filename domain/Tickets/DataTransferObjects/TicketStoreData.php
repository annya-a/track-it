<?php

namespace Domain\Tickets\DataTransferObjects;

use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;

class TicketStoreData extends Data
{
    public function __construct(
        #[Required, StringType, Max(255)]
        public string $title,
        #[IntegerType]
        public int $project_id,
        #[IntegerType]
        public  int $creator_id,
    )
    {
    }
}

