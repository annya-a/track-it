<?php

namespace App\Web\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Web\Requests\RegisteredRequest;
use Domain\Users\Actions\CreateUserAction;
use Domain\Users\Actions\UserLoginAction;
use Domain\Users\DataTransferObjects\UserStoreData;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    protected CreateUserAction $create_action;

    protected UserLoginAction $login_action;

    public function __construct(CreateUserAction $createAction, UserLoginAction $loginAction)
    {
        $this->create_action = $createAction;
        $this->login_action = $loginAction;
    }

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('users.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisteredRequest $request): RedirectResponse
    {
        $storeData = UserStoreData::from([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        $userData = $this->create_action->execute($storeData);

        $this->login_action->execute($userData);

        return redirect(RouteServiceProvider::HOME);
    }
}
