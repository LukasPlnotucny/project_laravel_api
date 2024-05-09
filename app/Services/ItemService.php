<?php

namespace App\Services;

use App\Models\Item;

class ItemService {

    public function createItem(array $data): Item
    {
        $item = Item::create($data);
        $item->save();

        return $item;
    }

    public function updateItem(Item $item, array $data): Item
    {
        $item->update($data);

        return $item;
    }

    public function deleteItem(Item $item): void
    {
        $item->delete();
    }
}