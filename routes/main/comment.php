<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/comments', [CommentController::class, 'index']);
    Route::post('/comments', [CommentController::class, 'store']);
    Route::put('/comments/{comment}', [CommentController::class, 'update']);
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy']);
});
