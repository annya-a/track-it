<?php

namespace App\Modules\Projects\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Companies\Http\Requests\CompanyStoreRequest;
use App\Modules\Companies\Models\Company;
use App\Modules\Projects\Http\Requests\ProjectStoreRequest;
use App\Modules\Projects\Models\Project;
use App\Providers\RouteServiceProvider;

class ProjectCreateController extends Controller
{
    public function create()
    {
        return view('projects.create');
    }

    public function store(ProjectStoreRequest $request)
    {
        $company = new Project;
        $company->name = $request->name;
        $company->creator_id = $request->user()->id;
        $company->company_id = $request->user()->company_id;
        $company->save();

        return redirect()->route('projects.index');
    }
}
