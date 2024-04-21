<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Interfaces\OrderRepositoryInterface;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;

class OrderController extends APIController
{
    public function __construct(
        private readonly OrderRepositoryInterface $orderRepository,
        private readonly OrderService $orderService,
    ) {}

    public function index(): JsonResponse
    {
        $orders = $this->orderRepository->getOrders();

        $resource = OrderResource::collection($orders);

        return $this->sendResponse($resource);
    }

    public function show(int $id): JsonResponse
    {
        $orders = $this->orderRepository->getOrderById($id);

        $resource = OrderResource::collection($orders);

        return $this->sendResponse($resource);
    }


}
