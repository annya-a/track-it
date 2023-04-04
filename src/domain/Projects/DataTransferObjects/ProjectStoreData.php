<?php

namespace Domain\Projects\DataTransferObjects;

use Spatie\LaravelData\Attributes\Validation\GreaterThan;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;

class ProjectStoreData extends Data
{
    public function __construct(
        #[Required, StringType, Max(255)]
        public string $name,
        #[Required, IntegerType, GreaterThan(0)]
        public int $creator_id,
        #[Required, IntegerType, GreaterThan(0)]
        public int $company_id
    ) {
    }
}

