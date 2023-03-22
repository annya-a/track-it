<?php

namespace App\Modules\Companies\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Companies\Http\Requests\CompanyStoreRequest;
use App\Modules\Companies\Models\Company;
use App\Providers\RouteServiceProvider;

class CompanyCreateController extends Controller
{
    public function create()
    {
        return view('companies.create');
    }

    public function store(CompanyStoreRequest $request)
    {
        $company = new Company;
        $company->name = $request->name;
        $company->creator_id = $request->user()->id;
        $company->save();

        $request->user()->company_id = $company->id;
        $request->user()->save();

        return redirect(RouteServiceProvider::HOME);
    }
}
