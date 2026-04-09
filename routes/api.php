<?php
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\DashboardController;

// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth.jwt');
// Route::get('/me', [AuthController::class, 'me'])->middleware('auth.jwt');

// Route::middleware('auth.jwt')->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index']);
// });

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;


// ✅ Protected routes dengan auth:api
// Route::middleware('auth:api')->group(function () {
    //     Route::post('/logout', [AuthController::class, 'logout']);
    //     Route::get('/me', [AuthController::class, 'me']);
    //     Route::get('/dashboard', [DashboardController::class, 'index']);
    // });

    // new
    // ✅ Rate limited
//     Route::middleware(['throttle:api'])->group(function () {
//         Route::post('/login', [AuthController::class, 'login']);
//         });
//         // old
//         // Route::post('/login', [AuthController::class, 'login']);
// Route::middleware('auth.jwt')->group(function () {
//     Route::post('/logout', [AuthController::class, 'logout']);
//     Route::get('/me', [AuthController::class, 'me']);
//     Route::get('/dashboard', [DashboardController::class, 'index']);
// });

Route::middleware('throttle:5,1')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth.jwt')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
    Route::get('/dashboard', [DashboardController::class, 'index']);
});
