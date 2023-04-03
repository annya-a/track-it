<?php

namespace App\Web\Companies\Controllers;

use App\Http\Controllers\Controller;
use App\Web\Companies\Requests\CompanyStoreRequest;
use Domain\Companies\Actions\CreateCompanyAction;
use Domain\Companies\DataTransferObjects\CompanyStoreData;

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
