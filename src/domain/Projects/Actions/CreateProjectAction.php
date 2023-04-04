<?php

namespace Domain\Projects\Actions;

use Domain\Projects\DataTransferObjects\ProjectData;
use Domain\Projects\DataTransferObjects\ProjectStoreData;
use Domain\Projects\Enums\ProjectStatus;
use Domain\Projects\Models\Project;

class CreateProjectAction
{
    public function execute(ProjectStoreData $data): ProjectData
    {
        $project = new Project;
        $project->name = $data->name;
        $project->creator_id = $data->creator_id;
        $project->company_id = $data->company_id;
        $project->status = ProjectStatus::open();
        $project->save();

        return ProjectData::from($project);
    }
}
