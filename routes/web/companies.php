<?php

use Illuminate\Support\Facades\Route;
use App\Web\Companies\Controllers\CompanyCreateController;
use Domain\Companies\Models\Company;

Route::middleware('auth')->group(function () {
    Route::get('/companies/create', [CompanyCreateController::class, 'create'])
        ->can('create', Company::class)
        ->name('companies.create');
    Route::post('/companies/create', [CompanyCreateController::class, 'store'])
        ->can('create', Company::class);
});
