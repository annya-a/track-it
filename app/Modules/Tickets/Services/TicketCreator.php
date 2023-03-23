<?php

namespace App\Modules\Tickets\Services;

use App\Modules\Projects\Models\Project;
use App\Modules\Tickets\Models\Ticket;
use App\Modules\Users\Models\User;

class TicketCreator
{
    public function create(string $title, Project $project, User $user): Ticket
    {
        $ticket = new Ticket;
        $ticket->title = $title;

        $ticket->project_id = $project->id;
        $ticket->creator_id = $user->id;
        $ticket->save();

        return $ticket;
    }
}
