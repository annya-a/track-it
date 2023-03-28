<?php

namespace App\App\Web\Controllers;

use App\App\Web\Requests\ProjectStoreRequest;
use App\Domain\Projects\DataTransferObjects\ProjectStoreData;
use App\Domain\Projects\Services\ProjectCreator;

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
        $data = ProjectStoreData::from([
            'name' => $request->name,
            'company_id' => $request->user()->company_id,
            'creator_id' => $request->user()->id
        ]);

        $this->project_creator->create($data);

        return redirect()->route('projects.index');
    }
}
