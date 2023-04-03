<?php

namespace Domain\Projects\Actions;

use Domain\Projects\DataTransferObjects\ProjectData;
use Domain\Projects\Models\Project;
use Spatie\LaravelData\PaginatedDataCollection;

class GetListOfProjectsAction
{
    public function execute(): PaginatedDataCollection
    {
        $projects = Project::openFirst()
            ->latest('updated_at')
            ->paginate()
            ->withQueryString()
            ->onEachSide(1);;

        return ProjectData::collection($projects);
    }
}
