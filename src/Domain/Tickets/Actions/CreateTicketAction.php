<?php

namespace Domain\Tickets\Actions;

use Domain\Tickets\DataTransferObjects\TicketData;
use Domain\Tickets\Enums\TicketStatus;
use Domain\Tickets\Models\Ticket;

class CreateTicketAction
{
    public function execute(TicketData $data): TicketData
    {
        $ticket = new Ticket;
        $ticket->title = $data->title;
        $ticket->project_id = $data->project_id;
        $ticket->creator_id = $data->creator_id;
        $ticket->status = TicketStatus::new();
        $ticket->save();

        $ticket->load(['project', 'creator']);

        return TicketData::from($ticket);
    }
}
