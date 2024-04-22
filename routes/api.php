<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->group(function () {

    //TODO: dopln is_admin middleware na users route

    Route::get('/user', [ AuthController::class, 'user' ]);

    Route::apiResource('orders', OrderController::class);

    Route::get('/test', function () {
        return ['ff' => 1];
    });


});
