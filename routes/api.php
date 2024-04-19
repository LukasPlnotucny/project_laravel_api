<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', [ AuthController::class, 'user' ]);

    Route::get('/test', function () {
        return ['ff' => 1];
    });


});
