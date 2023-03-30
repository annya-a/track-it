<?php

namespace App\Domain\Projects\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self open()
 * @method static self closed()
 */
final class ProjectStatus extends Enum
{
    protected static function labels(): array
    {
        return [
            'open' => 'Open',
            'closed' => 'Closed',
        ];
    }
}
