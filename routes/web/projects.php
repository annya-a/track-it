<?php

use App\Modules\Projects\Http\Controllers\ProjectCreateController;
use App\Modules\Projects\Models\Project;
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
});
