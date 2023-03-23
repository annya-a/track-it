<?php

namespace App\Modules\Projects\Services;

use App\Modules\Projects\Models\Project;
use App\Modules\Users\Models\User;

class ProjectCreator
{
    public function create(string $name, User $user)
    {
        $company = new Project;
        $company->name = $name;
        $company->creator_id = $user->id;
        $company->company_id = $user->company_id;
        $company->save();
    }
}
