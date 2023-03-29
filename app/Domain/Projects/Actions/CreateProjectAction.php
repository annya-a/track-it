<?php

namespace App\Domain\Projects\Actions;

use App\Domain\Projects\DataTransferObjects\ProjectData;
use App\Domain\Projects\DataTransferObjects\ProjectStoreData;
use App\Domain\Projects\Models\Project;

class CreateProjectAction
{
    public function execute(ProjectStoreData $data): ProjectData
    {
        $project = new Project;
        $project->name = $data->name;
        $project->creator_id = $data->creator_id;
        $project->company_id = $data->company_id;
        $project->save();

        return ProjectData::from($project);
    }
}
