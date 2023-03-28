<?php

namespace App\Domain\Tickets\Services;

use App\Domain\Projects\Models\Project;
use App\Domain\Tickets\DataTransferObjects\TicketStoreData;
use App\Domain\Tickets\Models\Ticket;
use App\Domain\Users\Models\User;

class TicketCreator
{
    public function create(TicketStoreData $data): Ticket
    {
        $ticket = new Ticket;
        $ticket->title = $data->title;
        $ticket->project_id = $data->project_id;
        $ticket->creator_id = $data->creator_id;
        $ticket->save();

        return $ticket;
    }
}
