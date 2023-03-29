<?php

namespace App\App\Web\Controllers;

use App\Domain\Projects\Actions\GetListOfAllProjectsAction;

class ProjectsController extends Controller
{
    public GetListOfAllProjectsAction $list_action;

    public function __construct(GetListOfAllProjectsAction $listAction)
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
