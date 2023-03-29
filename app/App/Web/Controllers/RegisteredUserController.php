<?php

namespace App\App\Web\Controllers;

use App\App\Web\Requests\RegisteredRequest;
use App\Domain\Users\Actions\CreateUserAction;
use App\Domain\Users\Actions\UserLoginAction;
use App\Domain\Users\DataTransferObjects\UserStoreData;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
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
