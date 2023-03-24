<?php

use App\Modules\Projects\Http\Controllers\ProjectCreateController;
use App\Modules\Projects\Models\Project;
use App\Modules\Tickets\Http\Controllers\TicketsIndexController;
use Illuminate\Support\Facades\Route;
use App\Modules\Projects\Http\Controllers\ProjectsController;

Route::middleware('auth')->group(function() {
    Route::get('/projects', [ProjectsController::class, 'index'])
        ->name('projects.index');
    Route::get('/projects/create', [ProjectCreateController::class, 'create'])
        ->can('create', Project::class)
        ->name('projects.create');
    Route::post('/projects/create', [ProjectCreateController::class, 'store'])
        ->can('create', Project::class);
    Route::get('/projects/{project}', [TicketsIndexController::class, 'index'])
        ->name('projects.show');
});
