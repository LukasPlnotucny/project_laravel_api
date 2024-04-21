<?php


namespace App\Repositories;
use App\Interfaces\OrderRepositoryInterface;
use App\Models\Order;
use \Closure;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Collection;

class OrderRepository implements OrderRepositoryInterface {

    private Closure $filterByUser;
    private Authenticatable $user;
    public function __construct()
    {
        $this->user = auth()->user();
        $this->filterByUser = fn ($query) => $query->where('user_id', $this->user->id);
    }
    public function getOrders(): Collection
    {
        return Order::query()
            ->when(! $this->user->is_admin, $this->filterByUser)
            ->get();
    }

    public function getOrderById(int $id): Order
    {
        return Order::query()
            ->when(! $this->user->is_admin, $this->filterByUser)
            ->findOrFail($id);
    }
}