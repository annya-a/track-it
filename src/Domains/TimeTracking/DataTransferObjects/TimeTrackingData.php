<?php

namespace Domain\TimeTracking\DataTransferObjects;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\GreaterThan;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Symfony\Contracts\Service\Attribute\Required;

class TimeTrackingData extends Data
{
    public function __construct(
        #[IntegerType, GreaterThan(0)]
        public ?int $id,
        #[Required, WithCast(DateTimeInterfaceCast::class)]
        public Carbon $started_at,
        #[WithCast(DateTimeInterfaceCast::class)]
        public ?Carbon $ended_at,
        #[Required, IntegerType, GreaterThan(0)]
        public int $creator_id,
        #[Required, IntegerType, GreaterThan(0)]
        public int $ticket_id,
        #[StringType, Max(255)]
        public ?string $description,
        #[WithCast(DateTimeInterfaceCast::class)]
        public ?Carbon $created_at,
        #[WithCast(DateTimeInterfaceCast::class)]
        public ?Carbon $updated_at,
    )
    {

    }
}
