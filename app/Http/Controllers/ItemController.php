<?php

namespace App\Http\Controllers;

use App\Interfaces\ItemRepositoryInterface;
use App\Services\ItemService;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct(
        private readonly ItemRepositoryInterface $itemRepository,
        private readonly ItemService $itemService,
    ) {}
}
