<?php

namespace App\Domain\Projects\Actions;

use App\Domain\Projects\DataTransferObjects\ProjectData;
use App\Domain\Projects\Models\Project;
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
