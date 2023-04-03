<?php

namespace Domain\Tickets\DataTransferObjects;

use Carbon\Carbon;
use Domain\Projects\DataTransferObjects\ProjectData;
use Domain\Tickets\Enums\TicketStatus;
use Domain\Users\DataTransferObjects\UserData;
use Spatie\LaravelData\Attributes\Validation\GreaterThan;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Casts\EnumCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;

class TicketData extends Data
{
    public function __construct(
        #[Required, IntegerType, GreaterThan(0)]
        public int $id,
        #[Required, StringType, Max(255)]
        public string $title,
        #[Required, WithCast(EnumCast::class)]
        public TicketStatus $status,
        #[Required, IntegerType, GreaterThan(0)]
        public int $project_id,
        #[Required, IntegerType, GreaterThan(0)]
        public int $creator_id,
        #[Required, WithCast(DateTimeInterfaceCast::class)]
        public Carbon $created_at,
        #[Required, WithCast(DateTimeInterfaceCast::class)]
        public Carbon $updated_at,
        public ProjectData|Lazy|null $project,
        public UserData|Lazy|null $creator,
    )
    {
    }
}
