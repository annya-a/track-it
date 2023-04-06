<?php

namespace Domain\TimeTracking\Policies;

use Domain\Tickets\Actions\GetTicketAction;
use Domain\Tickets\DataTransferObjects\TicketFindData;
use Domain\Users\Models\User;

class TimeTrackingPolicy
{
    protected GetTicketAction $get_ticket_action;

    public function __construct(GetTicketAction $getTicketAction)
    {
        $this->get_ticket_action = $getTicketAction;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, int $ticket): bool
    {
        $ticketData = $this->get_ticket_action->execute(
            TicketFindData::from([
                'id' => $ticket
            ]));

        return !is_null($ticketData);
    }
}
