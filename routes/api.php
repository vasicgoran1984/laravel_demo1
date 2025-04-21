<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OrderController;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::get('/user', [\App\Http\Controllers\Api\AuthController::class, 'getUser']);
    Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);

    // Products
    Route::apiResource('products', \App\Http\Controllers\Api\ProductController::class);

    // Users
    Route::apiResource('users', \App\Http\Controllers\Api\UserController::class);

    // Users
//    Route::apiResource('orders', \App\Http\Controllers\Api\OrderController::class);
    Route::get('orders', [OrderController::class, 'index']);

    // Status
    Route::get('orders/statuses', [OrderController::class, 'getStatuses']);
    Route::get('orders/{order}', [OrderController::class, 'view']);
    Route::post('orders/change-status/{order}/{status}', [OrderController::class, 'changeStatus']);
});

Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
