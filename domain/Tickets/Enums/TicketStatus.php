<?php

namespace Domain\Tickets\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self new()
 * @method static self assigned()
 * @method static self in_progress()
 * @method static self pending()
 * @method static self resolved()
 */
final class TicketStatus extends Enum
{
    public static function labels(): array
    {
        return [
            'new' => 'New',
            'assigned' => 'Assigned',
            'in_progress' => 'In Progress',
            'pending' => 'Pending',
            'resolved' => 'Resolved',
        ];
    }
}
