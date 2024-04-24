<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
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
        $order = $this->orderRepository->getOrderById($id);

        $resource = new OrderResource($order);

        return $this->sendResponse($resource);
    }

    public function store(CreateOrderRequest $request): JsonResponse
    {
        $order = $this->orderService->createOrder($request->all());

        $resource = new OrderResource($order);

        return $this->sendResponse($resource, __("apiMessages.contractGroup.stored", ["name" => $order->number]));
    }

    public function update(UpdateOrderRequest $request, int $id): JsonResponse
    {
        $order = $this->orderRepository->getOrderById($id);

        $order = $this->orderService->updateOrder($order, $request->all());

        $resource = new OrderResource($order);

        return $this->sendResponse($resource, __("apiMessages.contractGroup.updated", ["name" => $order->number]));
    }

    public function destroy(int $id): JsonResponse
    {
        $order = $this->orderRepository->getOrderById($id);

        $this->orderService->deleteOrder($order);

        return $this->sendResponse(null, __("apiMessages.contractGroup.destroyed", ["name" => $order->number]));
    }


    public function pay(int $id): JsonResponse
    {
        $order = $this->orderRepository->getOrderById($id);

        $this->orderService->payOrder($order);

        return $this->sendResponse($order, __("apiMessages.order.paid", ['order' => $order->number]));
    }

}
