<?php

namespace Domain\Tickets\Actions;

use Domain\Tickets\DataTransferObjects\TicketData;
use Domain\Tickets\Models\Ticket;

class GetTicketAction
{
    public function execute(int $id): TicketData
    {
        $ticket = Ticket::find($id);
        return TicketData::from($ticket);
    }
}
