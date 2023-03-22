<?php

use App\Modules\Companies\Http\Controllers\CompanyCreateController as CompanyCreateController;
use App\Modules\Companies\Models\Company as Company;
use App\Modules\Projects\Http\Controllers\ProjectsController;
use App\Modules\Tickets\Http\Controllers\TicketsController;
use Illuminate\Support\Facades\Route;

Route::group([], __DIR__ . '/web/users.php');

Route::middleware('auth')->group(function() {
    Route::get('/', [TicketsController::class, 'index'])
        ->name('dashboard');
    Route::get('/tickets', [TicketsController::class, 'index'])
        ->name('tickets.index');
    Route::get('/projects', [ProjectsController::class, 'index'])
        ->name('projects.index');
    Route::get('/companies/create', [CompanyCreateController::class, 'create'])
        ->can('create', Company::class)
        ->name('companies.create');
    Route::post('/companies/create', [CompanyCreateController::class, 'store'])
        ->can('create', Company::class);
});
