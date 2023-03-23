<?php

namespace App\Modules\Companies\Services;

use App\Modules\Companies\Models\Company;
use App\Modules\Users\Models\User;

class CompanyCreator
{
    public function create(string $name, User $user)
    {
        $company = new Company;
        $company->name = $name;
        $company->creator_id = $user->id;
        $company->save();
    }
}
