<?php

namespace App\App\Web\Controllers;

use App\App\Web\Requests\LoginRequest;
use App\Domain\Users\Actions\AttemptToLoginUserAction;
use App\Domain\Users\Actions\UserLogoutAction;
use App\Domain\Users\DataTransferObjects\UserLoginData;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
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
    public function store(LoginRequest $request, AttemptToLoginUserAction $attemptToLoginAction): RedirectResponse
    {
        $data = UserLoginData::from([
            'email' => $request->email,
            'password' => $request->password,
            'ip' => $request->ip(),
        ]);

        $attemptToLoginAction->execute($data);

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request, UserLogoutAction $logoutAction): RedirectResponse
    {
        $logoutAction->execute('web');

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
