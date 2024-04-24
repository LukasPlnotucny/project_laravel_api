<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;





Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('orders', OrderController::class);
    Route::get('/user', [ AuthController::class, 'user' ]);

    Route::middleware('is_admin')->group(function () {
        Route::apiResource('items', ItemController::class);
    });

    Route::middleware('order_not_paid')->group(function () {
        Route::post('/orders/{id}/pay', [OrderController::class, 'pay'])->name('orders.pay');
    });


});
