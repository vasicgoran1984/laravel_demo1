<?php

use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::get('/user', [\App\Http\Controllers\Api\AuthController::class, 'getUser']);
    Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);

    //Products
    Route::apiResource('products', \App\Http\Controllers\Api\ProductController::class);
});

Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
