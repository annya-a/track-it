<?php

use App\Modules\Companies\Http\Controllers\CompanyCreateController as CompanyCreateController;
use App\Modules\Companies\Models\Company;
use App\Modules\Tickets\Http\Controllers\TicketsController;
use Illuminate\Support\Facades\Route;

Route::group([], __DIR__ . '/web/projects.php');
Route::group([], __DIR__ . '/web/tickets.php');
Route::group([], __DIR__ . '/web/users.php');

Route::middleware('auth')->group(function() {
    Route::get('/', [TicketsController::class, 'index'])
        ->name('dashboard');
    Route::get('/companies/create', [CompanyCreateController::class, 'create'])
        ->can('create', Company::class)
        ->name('companies.create');
    Route::post('/companies/create', [CompanyCreateController::class, 'store'])
        ->can('create', Company::class);
});
