<?php

namespace App\Modules\Tickets\Enums;

enum TicketStatus
{
    case NEW;
    case ASSIGNED;
    case IN_PROGRESS;
    case PENDING;
    case RESOLVED;

    public function label(): string
    {
        return match($this){
            TicketStatus::NEW => 'New',
            TicketStatus::ASSIGNED => 'Assigned',
            TicketStatus::IN_PROGRESS => 'In Progress',
            TicketStatus::PENDING => 'Pending',
            TicketStatus::RESOLVED => 'Resolved',
        };
    }
}
