<?php

namespace App\App\Web\Controllers;

use App\App\Web\Requests\CompanyStoreRequest;
use App\Domain\Companies\DataTransferObjects\CompanyStoreData;
use App\Domain\Companies\Services\CompanyCreator;

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
        $data = CompanyStoreData::from([
            'name' => $request->name,
            'creator_id' => $request->user()->id
        ]);

        $this->company_creator->create($data);

        return redirect()->route('projects.create');
    }
}
