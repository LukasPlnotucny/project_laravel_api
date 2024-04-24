<?php


namespace App\Repositories;
use App\Interfaces\ItemRepositoryInterface;
use App\Interfaces\OrderRepositoryInterface;
use App\Models\Item;
use App\Models\Order;
use \Closure;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Collection;

class ItemRepository implements ItemRepositoryInterface {

    public function getItems(): Collection
    {
        return Item::all();
    }

    public function getItemById(int $id): Item
    {
        return Item::findOrFail($id);
    }
}