<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThreadController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/threads', [ThreadController::class, 'index']);
    Route::post('/threads', [ThreadController::class, 'store']);
    Route::put('/threads/{thread}', [ThreadController::class, 'update']);
    Route::delete('/threads/{thread}', [ThreadController::class, 'destroy']);
});
