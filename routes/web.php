<?php

use App\Modules\Tickets\Controllers\TicketsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TicketsController::class, 'index'])
    ->name('dashboard');
Route::get('/tickets', [TicketsController::class, 'index'])
    ->name('tickets.index');
