<?php

use App\App\Web\Controllers\CompanyCreateController as CompanyCreateController;
use App\App\Web\Controllers\TicketsIndexController;
use App\Domain\Companies\Models\Company;
use Illuminate\Support\Facades\Route;

Route::group([], __DIR__ . '/web/projects.php');
Route::group([], __DIR__ . '/web/tickets.php');
Route::group([], __DIR__ . '/web/users.php');

Route::middleware('auth')->group(function() {
    Route::get('/', [TicketsIndexController::class, 'index'])
        ->name('dashboard');
    Route::get('/companies/create', [CompanyCreateController::class, 'create'])
        ->can('create', Company::class)
        ->name('companies.create');
    Route::post('/companies/create', [CompanyCreateController::class, 'store'])
        ->can('create', Company::class);
});
