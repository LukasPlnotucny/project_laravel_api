<?php

namespace App\Services;

use App\Models\Order;

class OrderService {

    public function createOrder(array $data): Order
    {
        $order = Order::create($data);
        $order->user_id = auth()->user()->id;
        $order->save();

        return $order;
    }

    public function updateOrder(Order $order, array $data): Order
    {
        $order->update($data);

        return $order;
    }

    public function deleteOrder(Order $order): void
    {
        $order->delete();
    }

    public function payOrder(Order $order)
    {
        $order->paid_date = now();
        $order->save();

        return $order;
    }
}