<?php

use App\Modules\Tickets\Http\Controllers\TicketsController;
use App\Modules\Tickets\Http\Controllers\CreateTicketController;
use App\Modules\Tickets\Models\Ticket;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/tickets', [TicketsController::class, 'index'])
        ->name('tickets.index');
    Route::get('/projects/{project}/tickets', [TicketsController::class, 'index'])
        ->name('projects.tickets');
    Route::get('/projects/{project}/tickets/create', [CreateTicketController::class, 'create'])
        ->can('create', Ticket::class)
        ->name('tickets.create');
    Route::post('/projects/{project}/tickets/create', [CreateTicketController::class, 'store'])
        ->can('create', Ticket::class);
});
