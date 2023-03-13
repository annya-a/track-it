<?php

use App\Modules\Projects\Http\Controllers\ProjectsController;
use App\Modules\Tickets\Controllers\TicketsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TicketsController::class, 'index'])
    ->name('dashboard');
Route::get('/tickets', [TicketsController::class, 'index'])
    ->name('tickets.index');
Route::get('/projects', [ProjectsController::class, 'index'])
    ->name('projects.index');
