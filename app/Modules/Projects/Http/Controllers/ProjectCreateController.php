<?php

namespace App\Modules\Projects\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Projects\Http\Requests\ProjectStoreRequest;
use App\Modules\Projects\Models\Project;
use App\Modules\Projects\Services\ProjectCreator;

class ProjectCreateController extends Controller
{
    protected ProjectCreator $project_creator;

    public function __construct(ProjectCreator $projectCreator)
    {
        $this->project_creator = $projectCreator;
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(ProjectStoreRequest $request)
    {
        $this->project_creator->create($request->name, $request->user());

        return redirect()->route('projects.index');
    }
}
