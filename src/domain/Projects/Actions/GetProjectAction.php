<?php

namespace Domain\Projects\Actions;

use Domain\Projects\DataTransferObjects\ProjectData;
use Domain\Projects\Models\Project;

/**
 * Get project data by project id.
 */
class GetProjectAction
{
    public function execute(int $project): ProjectData
    {
        $project = Project::find($project);
        return ProjectData::from($project);
    }
}
