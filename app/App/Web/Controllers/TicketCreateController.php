<?php

namespace App\App\Web\Controllers;

use App\App\Web\Requests\TicketStoreRequest;
use App\Domain\Projects\Models\Project;
use App\Domain\Tickets\DataTransferObjects\TicketStoreData;
use App\Domain\Tickets\Services\TicketCreator;

class TicketCreateController extends Controller
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
        $data = TicketStoreData::from([
            'title' => $request->title,
            'project_id' => $project->id,
            'creator_id' => $request->user()->id,
        ]);

        $this->ticket_creator->create($data);

        return redirect()->route('projects.index');
    }
}
