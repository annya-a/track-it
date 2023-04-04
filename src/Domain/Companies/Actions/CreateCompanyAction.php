<?php

namespace Domain\Companies\Actions;

use Domain\Companies\DataTransferObjects\CompanyData;
use Domain\Companies\Models\Company;

class CreateCompanyAction
{
    public function execute(CompanyData $data): CompanyData
    {
        $company = new Company;
        $company->name = $data->name;
        $company->creator_id = $data->creator_id;
        $company->save();

        return CompanyData::from($company);
    }
}
