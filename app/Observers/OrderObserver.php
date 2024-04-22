<?php

namespace App\Observers;

use App\Models\Order;

class OrderObserver
{
    public function creating(Order $order): void
    {
        $countOrders = Order::whereYear('created_at', now()->year)->count();
        $difference = 6 - strlen($countOrders);

        $leadingZeros = max($difference, 0);
        $order->number = now()->year . str_pad("", $leadingZeros, '0') . $countOrders;
    }
}
