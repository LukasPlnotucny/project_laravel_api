<?php

namespace App\Interfaces;

use App\Repositories\OrderRepository;

/**
 * Interface for OrderRepository
 *
 * @see OrderRepository
 */
interface UserRepositoryInterface
{

    public function getUsers();

    public function getUserById(int $id);

}
