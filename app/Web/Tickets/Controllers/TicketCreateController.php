<?php

namespace App\Web\Tickets\Controllers;

use App\Http\Controllers\Controller;
use App\Web\Tickets\Requests\TicketStoreRequest;
use Domain\Projects\Actions\GetProjectAction;
use Domain\Tickets\Actions\CreateTicketAction;
use Domain\Tickets\DataTransferObjects\TicketStoreData;

class TicketCreateController extends Controller
{
    protected CreateTicketAction $create_action;

    protected GetProjectAction $get_project_action;

    public function __construct(CreateTicketAction $createAction, GetProjectAction $getProjectAction)
    {
        $this->create_action = $createAction;
        $this->get_project_action = $getProjectAction;
    }

    /**
     * Create ticket page.
     *
     * @param int $project
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create(int $project)
    {
        return view('tickets.create', [
            'project' => $this->get_project_action->execute($project)
        ]);
    }

    /**
     * Store project.
     *
     * @param TicketStoreRequest $request
     * @param int $project
     * @return \Illuminate\Http\RedirectResponse
     */
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
