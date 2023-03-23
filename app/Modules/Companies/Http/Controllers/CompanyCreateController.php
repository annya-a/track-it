<?php

namespace App\Modules\Companies\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Companies\Http\Requests\CompanyStoreRequest;
use App\Modules\Companies\Models\Company;
use App\Modules\Companies\Services\CompanyCreator;
use App\Providers\RouteServiceProvider;

class CompanyCreateController extends Controller
{
    protected CompanyCreator $company_creator;

    public function __construct(CompanyCreator $companyCreator)
    {
        $this->company_creator = $companyCreator;
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(CompanyStoreRequest $request)
    {
        $this->company_creator->create($request->name, $request->user());

        return redirect()->route('projects.create');
    }
}
