<?php

namespace App\Modules\Users\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Modules\Users\Auth\UserCreate;
use App\Modules\Users\Http\Requests\Auth\RegisteredRequest;
use App\Modules\Users\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    protected UserCreate $user_register;

    public function __construct(UserCreate $user_register)
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
        $this->user_register->create($request->email, $request->email, $request->password);

        return redirect(RouteServiceProvider::HOME);
    }
}
