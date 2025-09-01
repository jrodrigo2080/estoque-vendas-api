<?php

namespace App\Repositories\Inventories;

use App\Models\Inventory;

class InventoryRepository
{
    protected Inventory $inventory;
    public function __construct(Inventory $inventory)
    {
        $this->inventory = $inventory;
    }

    public function getAll()
    {
        return $this->inventory->all();
    }

    public function updateStoke(array $data)
    {
        $product = $this->inventory
            ->where('product_id', $data['product_id'])
            ->first();
        if (!$product) {
            return false;
        }

        $product->quantity += $data['quantity'];
        return $product->save();
    }
}