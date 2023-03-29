<?php

namespace App\Domain\Tickets\DataTransferObjects;

use App\Domain\Tickets\Enums\TicketStatus;
use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\GreaterThan;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Casts\EnumCast;
use Spatie\LaravelData\Data;

class TicketData extends Data
{
    public function __construct(
        #[Required, IntegerType, GreaterThan(0)]
        public int $id,
        #[Required, StringType, Max(255)]
        public string $title,
        #[Required, IntegerType, GreaterThan(0)]
        public int $project_id,
        #[Required, IntegerType, GreaterThan(0)]
        public int $creator_id,
        #[Required, WithCast(EnumCast::class)]
        public TicketStatus $status,
        #[Required, WithCast(DateTimeInterfaceCast::class)]
        public Carbon $created_at,
        #[Required, WithCast(DateTimeInterfaceCast::class)]
        public Carbon $updated_at
    )
    {
    }
}
