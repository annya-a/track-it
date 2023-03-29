<?php

namespace App\Domain\Projects\Actions;

use App\Domain\Projects\Models\Project;

class GetListOfAllProjectsAction
{
    public function execute()
    {
        return Project::openFirst()
            ->latest('updated_at')
            ->paginate();
    }
}
