<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/notifications', [NotificationController::class, 'index']);
    Route::post('/notifications', [NotificationController::class, 'store']);
    Route::delete('/notifications/{notification}', [NotificationController::class, 'destroy']);
});
