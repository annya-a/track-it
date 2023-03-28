<?php

namespace App\App\Web\Controllers;

use App\App\Web\Requests\RegisteredRequest;
use App\Domain\Projects\DataTransferObjects\ProjectStoreData;
use App\Domain\Users\Auth\UserCreator;
use App\Domain\Users\DataTransferObjects\UserStoreData;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    protected UserCreator $user_register;

    public function __construct(UserCreator $user_register)
    {
        $this->user_register = $user_register;
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
        $data = UserStoreData::from([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        $this->user_register->create($data);

        return redirect(RouteServiceProvider::HOME);
    }
}
