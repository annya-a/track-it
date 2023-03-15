<?php

use App\Modules\Projects\Http\Controllers\ProjectsController;
use App\Modules\Tickets\Http\Controllers\TicketsController;
use Illuminate\Support\Facades\Route;

Route::group([], __DIR__ . '/web/users.php');

Route::get('/', [TicketsController::class, 'index'])
    ->name('dashboard');
Route::get('/tickets', [TicketsController::class, 'index'])
    ->name('tickets.index');
Route::get('/projects', [ProjectsController::class, 'index'])
    ->name('projects.index');
