<?php

namespace App\Domain\Companies\Actions;

use App\Domain\Companies\DataTransferObjects\CompanyData;
use App\Domain\Companies\DataTransferObjects\CompanyStoreData;
use App\Domain\Companies\Models\Company;

class CreateCompanyAction
{
    public function execute(CompanyStoreData $data): CompanyData
    {
        $company = new Company;
        $company->name = $data->name;
        $company->creator_id = $data->creator_id;
        $company->save();

        return CompanyData::from($company);
    }
}
