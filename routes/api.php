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
    // Customers
    Route::apiResource('customers', \App\Http\Controllers\Api\CustomerController::class);
    // Orders
    Route::get('orders', [OrderController::class, 'index']);

    // Countries
    Route::get('/countries', [\App\Http\Controllers\Api\CustomerController::class, 'countries']);

    // Status
    Route::get('orders/statuses', [OrderController::class, 'getStatuses']);
    Route::get('orders/{order}', [OrderController::class, 'view']);
    Route::post('orders/change-status/{order}/{status}', [OrderController::class, 'changeStatus']);

    // Dashboard Routes
    Route::get('dashboard/customers-count', [\App\Http\Controllers\Api\DashboardController::class, 'activeCustomers']);
    Route::get('dashboard/products-count', [\App\Http\Controllers\Api\DashboardController::class, 'activeProducts']);
    Route::get('dashboard/orders-count', [\App\Http\Controllers\Api\DashboardController::class, 'paidOrders']);
    Route::get('dashboard/income-amount', [\App\Http\Controllers\Api\DashboardController::class, 'totalIncome']);
    Route::get('dashboard/orders-by-country', [\App\Http\Controllers\Api\DashboardController::class, 'ordersByCountry']);
});

Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
