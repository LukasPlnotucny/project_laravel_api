<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'vat' => $this->vat,
            'price_with_vat' => $this->price_with_vat,
            'quantity' => $this->whenPivotLoaded('item_order', function () {
                return $this->pivot->quantity;
            }, 0)
        ];
    }
}
