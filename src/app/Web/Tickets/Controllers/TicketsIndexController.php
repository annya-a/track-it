<?php

namespace App\Web\Tickets\Controllers;

use App\Http\Controllers\Controller;
use Domain\Projects\Actions\GetProjectAction;
use Domain\Projects\DataTransferObjects\ProjectData;
use Domain\Tickets\Actions\GetTicketsListAction;
use Domain\Tickets\DataTransferObjects\TicketsListData;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class TicketsIndexController extends Controller
{
    protected GetTicketsListAction $list_action;

    protected GetProjectAction $get_project_action;

    public function __construct(GetTicketsListAction $listAction, GetProjectAction $getProjectAction)
    {
        $this->list_action = $listAction;
        $this->get_project_action = $getProjectAction;
    }

    /**
     * Get list of tickets.
     *
     * @param Request $request
     * @param int|null $project
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     *
     */
    public function index(Request $request, ?int $project = null)
    {
        $data = TicketsListData::from([
            'search' => $request->search,
            'project_id' => $project,
        ]);

        $projectData = $project ? $this->get_project_action->execute($project) : null;

        $tickets = $this->list_action->execute($data);

        return view('tickets.index', [
            'tickets' => $tickets,
            'pageTitle' => $this->getPageTitle($request->route(), $projectData),
            'searchAction' => $this->getSearchAction($projectData),
        ]);
    }

    /**
     * Get page title.
     *
     * @param ProjectData|null $project
     * @return string
     */
    private function getPageTitle(Route $route, ?ProjectData $project): string
    {
        if ($route->named('dashboard')) {
            return 'Dashboard';
        }

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
