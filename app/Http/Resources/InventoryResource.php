<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InventoryResource extends JsonResource
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
            'product_name' => $this->product->name,
            'quantity' => $this->quantity,
            'price' => $this->product->sale_price,
            'total_profit' => $this->quantity * ($this->product->sale_price - $this->product->cost_price),
            'price_total' => $this->quantity * $this->product->sale_price,
        ];
        
    }
}
