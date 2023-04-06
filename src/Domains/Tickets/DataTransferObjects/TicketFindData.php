<?php

namespace Domain\Tickets\DataTransferObjects;

use Spatie\LaravelData\Attributes\Validation\ArrayType;
use Spatie\LaravelData\Attributes\Validation\In;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\Validation\Required;

class TicketFindData extends Data
{
    public function __construct(
        #[Required, IntegerType]
        public int $id,
        #[ArrayType, In(['company', 'project', 'creator'])]
        public ?array $relations = []
    )
    {

    }
}
