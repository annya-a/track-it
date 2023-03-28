<?php

namespace App\Domain\Projects\Services;

use App\Domain\Projects\DataTransferObjects\ProjectStoreData;
use App\Domain\Projects\Models\Project;

class ProjectCreator
{
    public function create(ProjectStoreData $data)
    {
        $company = new Project;
        $company->name = $data->name;
        $company->creator_id = $data->creator_id;
        $company->company_id = $data->company_id;
        $company->save();
    }
}
