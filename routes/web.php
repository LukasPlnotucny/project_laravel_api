<?php

use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    $order = \App\Models\Order::first();

    $item = \App\Models\Item::first();

    $order->items()->attach($item, ['quantity' => 10]);

});;
