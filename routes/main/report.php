<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/reports', [ReportController::class, 'index']);
    Route::post('/reports', [ReportController::class, 'store']);
    Route::delete('/reports/{report}', [ReportController::class, 'destroy']);
});
