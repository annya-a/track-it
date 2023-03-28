<?php

use App\App\Web\Controllers\TicketCreateController;
use App\App\Web\Controllers\TicketsIndexController;
use App\Domain\Tickets\Models\Ticket;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/tickets', [TicketsIndexController::class, 'index'])
        ->name('tickets.index');
    Route::get('/projects/{project}/tickets', [TicketsIndexController::class, 'index'])
        ->name('projects.tickets');
    Route::get('/projects/{project}/tickets/create', [TicketCreateController::class, 'create'])
        ->can('create', Ticket::class)
        ->name('tickets.create');
    Route::post('/projects/{project}/tickets/create', [TicketCreateController::class, 'store'])
        ->can('create', Ticket::class);
});
