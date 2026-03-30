<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuildController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/builds', [BuildController::class, 'index']);
    Route::post('/builds', [BuildController::class, 'store']);
    Route::put('/builds/{build}', [BuildController::class, 'update']);
    Route::delete('/builds/{build}', [BuildController::class, 'destroy']);
});
