<?php

namespace App\App\Web\Controllers;

use App\Domain\Projects\Actions\GetListOfProjectsAction;

class ProjectsIndexController extends Controller
{
    public GetListOfProjectsAction $list_action;

    public function __construct(GetListOfProjectsAction $listAction)
    {
        $this->list_action = $listAction;
    }

    /**
     * List of projects.
     */
    public function index()
    {
        return view('projects.index', [
            'projects' => $this->list_action->execute(),
        ]);
    }
}
