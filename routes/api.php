<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->group(function () {

    //TODO: dopln is_admin middleware na users route

    Route::get('/user', [ AuthController::class, 'user' ]);

    Route::apiResource('orders', OrderController::class);

    Route::middleware('order_not_paid')->group(function () {
        Route::post('/orders/{id}/pay', [OrderController::class, 'pay'])->name('orders.pay');
    });


});
