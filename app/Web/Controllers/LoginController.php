<?php

namespace App\Web\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Web\Requests\LoginRequest;
use Domain\Users\Actions\AttemptToLoginUserAction;
use Domain\Users\DataTransferObjects\UserLoginData;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LoginController extends Controller
{
    protected AttemptToLoginUserAction $attempt_to_login_action;

    public function __construct(AttemptToLoginUserAction $attemptToLoginAction)
    {
        $this->attempt_to_login_action = $attemptToLoginAction;
    }

    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('users.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $data = UserLoginData::from([
            'email' => $request->email,
            'password' => $request->password,
            'ip' => $request->ip(),
        ]);

        $this->attempt_to_login_action->execute($data);

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
