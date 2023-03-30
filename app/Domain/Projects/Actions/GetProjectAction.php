<?php

namespace App\Domain\Projects\Actions;

use App\Domain\Projects\DataTransferObjects\ProjectData;
use App\Domain\Projects\Models\Project;

/**
 * Get project data by project id.
 */
class GetProjectAction
{
    public function execute(int $projectId): ProjectData
    {
        return ProjectData::from(Project::find($projectId));
    }
}
