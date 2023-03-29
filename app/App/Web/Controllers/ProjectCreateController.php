<?php

namespace App\App\Web\Controllers;

use App\App\Web\Requests\ProjectStoreRequest;
use App\Domain\Projects\DataTransferObjects\ProjectStoreData;
use App\Domain\Projects\Actions\CreateProjectAction;

class ProjectCreateController extends Controller
{
    protected CreateProjectAction $create_action;

    public function __construct(CreateProjectAction $createAction)
    {
        $this->create_action = $createAction;
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

        $this->create_action->execute($data);

        return redirect()->route('projects.index');
    }
}
