<?php

namespace App\Providers;

use App\Interfaces\ItemRepositoryInterface;
use App\Interfaces\OrderRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\ItemRepository;
use App\Repositories\OrderRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public array $bindings = [
        UserRepositoryInterface::class => UserRepository::class,
        OrderRepositoryInterface::class => OrderRepository::class,
        ItemRepositoryInterface::class => ItemRepository::class,
    ];

    public function register(): void
    {
        $this->bindRepositories();
    }

    private function bindRepositories(): void
    {
        foreach ($this->bindings as $interface => $repository) {
            $this->app->bind($interface, $repository);
        }
    }
}
