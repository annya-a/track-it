<?php

namespace App\Domain\Users\Observers;

use App\Domain\Companies\Models\Company;

class CompanyObserver
{
    /**
     * Handle the Company "created" event.
     */
    public function created(Company $company): void
    {
        $company->creator->company_id = $company->id;
        $company->creator->save();
    }
}
