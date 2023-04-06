<?php

use App\Web\TimeTracking\Controllers\TimeTrackingCreateController;
use Domain\TimeTracking\Models\TimeTracking;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function() {
    Route::get('tickets/{ticket}/time-tracking/create', [TimeTrackingCreateController::class, 'create'])
        ->name('time_tracking.create')
        ->can('create', [TimeTracking::class, 'ticket']);

    Route::post('tickets/{ticket}/time-tracking/create', [TimeTrackingCreateController::class, 'store'])
        ->can('create', [TimeTracking::class, 'ticket']);
});
