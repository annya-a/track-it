<?php

namespace App\App\Web\Controllers;

use App\Domain\Projects\DataTransferObjects\ProjectData;
use App\Domain\Projects\Models\Project;
use App\Domain\Tickets\Actions\GetTicketsListAction;
use App\Domain\Tickets\DataTransferObjects\TicketsListFetchData;
use Illuminate\Http\Request;

class TicketsIndexController extends Controller
{
    protected GetTicketsListAction $list_action;

    public function __construct(GetTicketsListAction $listAction)
    {
        $this->list_action = $listAction;
    }

    /**
     * Get list of tickets.
     *
     * @param Request $request
     * @param int|null $projectId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     *
     */
    public function index(Request $request, ?int $project = null)
    {
        $data = TicketsListFetchData::from([
            'search' => $request->search,
            'project_id' => $project,
        ]);

        $projectData = $project ? ProjectData::from(Project::find($project)) : null;

        $tickets = $this->list_action->execute($data);

        $tickets->load('project');

        return view('tickets.index', [
            'tickets' => $tickets,
            'pageTitle' => $this->getPageTitle($projectData),
            'searchAction' => $this->getSearchAction($projectData),
        ]);
    }

    /**
     * Get page title.
     *
     * @param ProjectData|null $project
     * @return string
     */
    private function getPageTitle(?ProjectData $project): string
    {
        return $project ? $project->name : 'Tickets';
    }

    /**
     * Get search action.
     */
    private function getSearchAction(?ProjectData $projectData): string
    {
        return $projectData
            ? route('projects.show', $projectData->id)
            : route('tickets.index');
    }
}
