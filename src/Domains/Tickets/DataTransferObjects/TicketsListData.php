<?php

namespace Domain\Tickets\DataTransferObjects;

use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;

class TicketsListData extends Data
{
    public function __construct(
        #[Nullable, StringType]
        public ?string $search,
        #[Nullable, IntegerType]
        public ?int $project_id,
    )
    {

    }
}
