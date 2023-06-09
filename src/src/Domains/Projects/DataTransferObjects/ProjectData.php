<?php

namespace Domain\Projects\DataTransferObjects;

use Carbon\Carbon;
use Domain\Companies\DataTransferObjects\CompanyData;
use Domain\Projects\Enums\ProjectStatus;
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

class ProjectData extends Data
{
    public function __construct(
        #[IntegerType, GreaterThan(0)]
        public ?int $id,
        #[Required, StringType, Max(255)]
        public string $name,
        #[Required, IntegerType, GreaterThan(0)]
        public int $creator_id,
        #[IntegerType, GreaterThan(0)]
        public ?int $company_id,
        #[WithCast(EnumCast::class)]
        public ?ProjectStatus $status,
        #[WithCast(DateTimeInterfaceCast::class)]
        public ?Carbon $created_at,
        #[WithCast(DateTimeInterfaceCast::class)]
        public ?Carbon $updated_at,
        public ?UserData $creator,
        public ?CompanyData $company,
    ) {
    }
}
