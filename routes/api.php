<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    require __DIR__ . '/main/build.php';
    require __DIR__ . '/main/builditem.php';
    require __DIR__ . '/main/comment.php';
    require __DIR__ . '/main/media.php';
    require __DIR__ . '/main/notification.php';
    require __DIR__ . '/main/report.php';
    require __DIR__ . '/main/thread.php';
    require __DIR__ . '/main/user.php';
});
