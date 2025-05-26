<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\TypeController;


//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

// Register New User
Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);

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
    Route::get('/dashboard/customers-count', [DashboardController::class, 'activeCustomers']);
    Route::get('/dashboard/products-count', [DashboardController::class, 'activeProducts']);
    Route::get('/dashboard/orders-count', [DashboardController::class, 'paidOrders']);
    Route::get('/dashboard/income-amount', [DashboardController::class, 'totalIncome']);
    Route::get('/dashboard/orders-by-country', [DashboardController::class, 'ordersByCountry']);
    Route::get('/dashboard/latest-customers', [DashboardController::class, 'latestCustomers']);
    Route::get('/dashboard/latest-orders', [DashboardController::class, 'latestOrders']);




    /***************************************************************************************************
     * New Api
     **************************************************************************************************/

    // Get Porducer/Type
    Route::get('/producer-type/{id}', [TypeController::class, 'getProducerType']);

    // Service
    Route::apiResource('service', \App\Http\Controllers\Api\ServiceController::class);
    Route::get('/service/service-id/{id}', [ServiceController::class, 'serviceByServiceId']);

    // Producer
    Route::apiResource('producer', \App\Http\Controllers\Api\ProducerController::class);

    // Type
    Route::get('type/{id}', [TypeController::class, 'index']);

    // Car
    Route::apiResource('cars', \App\Http\Controllers\Api\CarController::class);

    // Car
    Route::apiResource('owners', \App\Http\Controllers\Api\OwnerController::class);

    // Show All Cars
    Route::get('/show-all-cars', [\App\Http\Controllers\Api\CarController::class, 'showAllCars']);

    // Get Cars To Add Owner
    Route::get('/getCarsToAddOwner', [\App\Http\Controllers\Api\CarController::class, 'getCarsToAddOwner']);

    // Owner Cars
    Route::apiResource('ownerCars', \App\Http\Controllers\Api\CarOwnerController::class);

    // Book Service
    Route::apiResource('bookService', \App\Http\Controllers\Api\BookServiceController::class);

    Route::get('/lastBookService/{book_id}', [\App\Http\Controllers\Api\BookServiceController::class, 'lastBookService']);
    Route::put('/insertKilometers/{book_id}', [\App\Http\Controllers\Api\BookServiceController::class, 'insertKilometers']);

    // Car Service
    Route::apiResource('carService', \App\Http\Controllers\Api\CarServiceController::class);

    // Show All Services By Book Service ID
    Route::get('show-all-services/{book_id}', [\App\Http\Controllers\Api\CarServiceController::class, 'showAllServices']);

});

Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
