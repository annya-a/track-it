<?php

use App\Web\TimeTracking\Controllers\TimeTrackingCreateController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function() {
    Route::get('ticket/{ticket}/time-tracking/create', [TimeTrackingCreateController::class, 'create'])
        ->name('time_tracking.create');

    Route::post('ticket/{ticket}/time-tracking/create', [TimeTrackingCreateController::class, 'store']);
});
