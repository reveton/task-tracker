<?php
use Illuminate\Support\Facades\Route;
use App\TaskTracker\Infrastructure\Http\Controllers\TaskTrackerController;

Route::prefix('tasks')->group(function () {
    Route::get('/', [TaskTrackerController::class, 'index']);
    Route::put('{task_id}/status', [TaskTrackerController::class, 'updateStatus']);
    Route::put('{task_id}/assign', [TaskTrackerController::class, 'assignToUser']);
});