<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuildItemController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/build-items', [BuildItemController::class, 'index']);
    Route::post('/build-items', [BuildItemController::class, 'store']);
    Route::put('/build-items/{item}', [BuildItemController::class, 'update']);
    Route::delete('/build-items/{item}', [BuildItemController::class, 'destroy']);
});
