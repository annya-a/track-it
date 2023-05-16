<?php

namespace App\Web\Users\Controllers;

use App\Http\Controllers\Controller;
use Domain\Users\Actions\UserLogoutAction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    protected UserLogoutAction $logout_action;

    public function __construct(UserLogoutAction $logoutAction)
    {
        $this->logout_action = $logoutAction;
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $this->logout_action->execute('web');

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
