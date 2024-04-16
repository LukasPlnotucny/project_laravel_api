<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/hello', function () {
    return Auth::user();
});

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/test', function () {
        return ['ff' => 1];
    });

});
