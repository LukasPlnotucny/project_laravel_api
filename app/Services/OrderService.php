<?php

namespace App\Services;

use App\Models\Order;

class OrderService {

    public function createOrder(array $data): Order
    {
        $order = Order::create($data);
        $order->user_id = auth()->user()->id;
        $order->save();

        $this->attachItems($order, $data);

        return $order;
    }

    public function updateOrder(Order $order, array $data): Order
    {
        $order->update($data);

        $this->attachItems($order, $data);

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

    private function attachItems(Order $order, array $data): void
    {
        $order->items()->detach();

        foreach ($data['items'] as $item) {
            $order->items()->attach($item['id'], ['quantity' => $item['quantity']]);
        }
    }
}