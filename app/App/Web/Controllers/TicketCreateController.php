<?php

namespace App\App\Web\Controllers;

use App\App\Web\Requests\TicketStoreRequest;
use App\Domain\Projects\DataTransferObjects\ProjectData;
use App\Domain\Projects\Models\Project;
use App\Domain\Tickets\DataTransferObjects\TicketStoreData;
use App\Domain\Tickets\Actions\CreateTicketAction;

class TicketCreateController extends Controller
{
    protected CreateTicketAction $create_action;

    public function __construct(CreateTicketAction $createAction)
    {
        $this->create_action = $createAction;
    }

    public function create(int $project)
    {
        $project = ProjectData::from(Project::find($project));
        return view('tickets.create', compact('project'));
    }

    public function store(TicketStoreRequest $request, int $project)
    {
        $data = TicketStoreData::from([
            'title' => $request->title,
            'project_id' => $project,
            'creator_id' => $request->user()->id,
        ]);

        $this->create_action->execute($data);

        return redirect()->route('projects.show', $project);
    }
}
