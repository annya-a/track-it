<?php

use App\Web\Companies\Controllers\CompanyCreateController as CompanyCreateController;
use App\Web\Tickets\Controllers\TicketsIndexController;
use Domain\Companies\Models\Company;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale()], function() {
    Route::group([], __DIR__ . '/web/companies.php');
    Route::group([], __DIR__ . '/web/projects.php');
    Route::group([], __DIR__ . '/web/tickets.php');
    Route::group([], __DIR__ . '/web/time_tracking.php');
    Route::group([], __DIR__ . '/web/users.php');

    Route::middleware('auth')->group(function() {
        Route::get('/', [TicketsIndexController::class, 'index'])
            ->name('dashboard');
    });
});
