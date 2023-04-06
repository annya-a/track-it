<?php

namespace Domain\Tickets\Actions;

use Domain\Tickets\DataTransferObjects\TicketData;
use Domain\Tickets\DataTransferObjects\TicketFindData;
use Domain\Tickets\Models\Ticket;

class GetTicketAction
{
    public function execute(TicketFindData $data): TicketData| null
    {
        if (!$ticket = Ticket::find($data->id)) {
            return null;
        }

        foreach ($data->relations as $relation) {
            $ticket->load(['project']);
        }

        return TicketData::from($ticket);
    }
}
