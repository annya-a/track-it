<?php

namespace App\Modules\Tickets\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Projects\Models\Project;
use App\Modules\Tickets\Http\Requests\TicketStoreRequest;
use App\Modules\Tickets\Services\TicketCreator;

class CreateTicketController extends Controller
{
    protected TicketCreator $ticket_creator;

    public function __construct(TicketCreator $ticketCreator)
    {
        $this->ticket_creator = $ticketCreator;
    }

    public function create(Project $project)
    {
        return view('tickets.create', compact('project'));
    }

    public function store(TicketStoreRequest $request, Project $project)
    {
        $this->ticket_creator->create($request->title, $project, $request->user());

        return redirect()->route('projects.index');
    }
}
