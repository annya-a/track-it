<?php

namespace App\Domain\Companies\Services;

use App\Domain\Companies\DataTransferObjects\CompanyStoreData;
use App\Domain\Companies\Models\Company;

class CompanyCreator
{
    public function create(CompanyStoreData $data)
    {
        $company = new Company;
        $company->name = $data->name;
        $company->creator_id = $data->creator_id;
        $company->save();
    }
}
