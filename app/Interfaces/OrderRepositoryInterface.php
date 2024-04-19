<?php

namespace App\Interfaces;

use App\Repositories\OrderRepository;

/**
 * Interface for OrderRepository
 *
 * @see OrderRepository
 */
interface OrderRepositoryInterface
{

    public function getOrders();

    public function getOrderById(int $id);

}
