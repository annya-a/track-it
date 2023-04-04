<?php

namespace Domain\Companies\Actions;

use Domain\Companies\DataTransferObjects\CompanyData;
use Domain\Companies\DataTransferObjects\CompanyStoreData;
use Domain\Companies\Models\Company;

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
