<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Http\Resources\ItemResource;
use App\Interfaces\ItemRepositoryInterface;
use App\Services\ItemService;
use Illuminate\Http\JsonResponse;

class ItemController extends APIController
{
    public function __construct(
        private readonly ItemRepositoryInterface $itemRepository,
        private readonly ItemService $itemService,
    ) {}

    public function index(): JsonResponse
    {
        $items = $this->itemRepository->getItems();

        $resource = ItemResource::collection($items);

        return $this->sendResponse($resource);
    }

    public function show(int $id): JsonResponse
    {
        $item = $this->itemRepository->getItemById($id);

        $resource = new ItemResource($item);

        return $this->sendResponse($resource);
    }

    public function store(CreateItemRequest $request): JsonResponse
    {
        $item = $this->itemService->createItem($request->all());

        $resource = new ItemResource($item);

        return $this->sendResponse($resource, __("apiMessages.contractGroup.stored", ["name" => $item->name]));
    }

    public function update(UpdateItemRequest $request, int $id): JsonResponse
    {
        $item = $this->itemRepository->getItemById($id);

        $item = $this->itemService->updateItem($item, $request->all());

        $resource = new ItemResource($item);

        return $this->sendResponse($resource, __("apiMessages.contractGroup.updated", ["name" => $item->name]));
    }

    public function destroy(int $id): JsonResponse
    {
        $item = $this->itemRepository->getItemById($id);

        $this->itemService->deleteItem($item);

        return $this->sendResponse(null, __("apiMessages.contractGroup.destroyed", ["name" => $item->name]));
    }
}
