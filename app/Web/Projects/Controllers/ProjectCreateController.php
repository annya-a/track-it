<?php

namespace App\Web\Projects\Controllers;

use App\Http\Controllers\Controller;
use App\Web\Projects\Requests\ProjectStoreRequest;
use Domain\Projects\Actions\CreateProjectAction;
use Domain\Projects\DataTransferObjects\ProjectData;

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
        $data = ProjectData::from([
            'name' => $request->name,
            'company_id' => $request->user()->company_id,
            'creator_id' => $request->user()->id,
        ]);

        $this->create_action->execute($data);

        return redirect()->route('projects.index');
    }
}
