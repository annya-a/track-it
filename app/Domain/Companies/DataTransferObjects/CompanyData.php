<?php

namespace App\Domain\Companies\DataTransferObjects;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\GreaterThan;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class CompanyData extends Data
{
    public function __construct(
        #[Required, IntegerType, GreaterThan(0)]
        public int $id,
        #[Required, StringType, Max(255)]
        public string $name,
        #[Required, IntegerType, GreaterThan(0)]
        public int $creator_id,
        #[Required, WithCast(DateTimeInterfaceCast::class)]
        public Carbon $created_at,
        #[Required, WithCast(DateTimeInterfaceCast::class)]
        public Carbon $updated_at,
    ) {
    }
}
