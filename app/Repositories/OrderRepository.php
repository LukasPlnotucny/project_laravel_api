<?php


namespace App\Repositories;
use App\Interfaces\OrderRepositoryInterface;
use App\Models\Order;
use \Closure;

class OrderRepository implements OrderRepositoryInterface {

    private Closure $filterByUser;
    public function __construct()
    {
        $this->filterByUser = fn ($query, $user) => $query->where('user_id', $user->id);
    }
    public function getOrders()
    {
        return Order::query()
            ->when(! auth()->user()->is_admin, $this->filterByUser)
            ->get();
    }

    public function getOrderById(int $id)
    {
        return Order::query()
            ->when(! auth()->user()->is_admin, $this->filterByUser)
            ->findOrFail($id);
    }
}