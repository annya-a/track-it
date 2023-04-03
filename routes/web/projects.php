<?php

use App\Web\Controllers\ProjectCreateController;
use App\Web\Controllers\ProjectsIndexController;
use App\Web\Controllers\TicketsIndexController;
use Domain\Projects\Models\Project;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function() {
    Route::get('/projects', [ProjectsIndexController::class, 'index'])
        ->name('projects.index');
    Route::get('/projects/create', [ProjectCreateController::class, 'create'])
        ->can('create', Project::class)
        ->name('projects.create');
    Route::post('/projects/create', [ProjectCreateController::class, 'store'])
        ->can('create', Project::class);
    Route::get('/projects/{project}', [TicketsIndexController::class, 'index'])
        ->name('projects.show');
});
