<?php

namespace App\App\Web\Controllers;

use App\App\Web\Requests\CompanyStoreRequest;
use App\Domain\Companies\Actions\CreateCompanyAction;
use App\Domain\Companies\DataTransferObjects\CompanyStoreData;

class CompanyCreateController extends Controller
{
    protected CreateCompanyAction $create_action;

    public function __construct(CreateCompanyAction $createAction)
    {
        $this->create_action = $createAction;
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

        $this->create_action->execute($data);

        return redirect()->route('projects.create');
    }
}
