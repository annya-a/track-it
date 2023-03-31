<?php

namespace App\Domain\Tickets\Actions;

use App\Domain\Projects\Models\Project;
use App\Domain\Tickets\DataTransferObjects\TicketData;
use App\Domain\Tickets\DataTransferObjects\TicketStoreData;
use App\Domain\Tickets\Enums\TicketStatus;
use App\Domain\Tickets\Models\Ticket;
use App\Domain\Users\Models\User;

class CreateTicketAction
{
    public function execute(TicketStoreData $data): TicketData
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
