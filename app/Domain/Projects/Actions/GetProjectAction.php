<?php

namespace App\Domain\Projects\Actions;

use App\Domain\Projects\DataTransferObjects\ProjectData;
use App\Domain\Projects\Models\Project;

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
