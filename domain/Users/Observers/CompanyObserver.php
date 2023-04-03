<?php

namespace Domain\Users\Observers;

use Domain\Companies\Models\Company;

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
