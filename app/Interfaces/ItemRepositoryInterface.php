<?php

namespace App\Interfaces;

use App\Repositories\OrderRepository;

/**
 * Interface for OrderRepository
 *
 * @see OrderRepository
 */
interface ItemRepositoryInterface
{

    public function getItems();

    public function getItemById(int $id);

}
