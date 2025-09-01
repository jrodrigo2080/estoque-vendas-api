<?php

namespace App\Services\Inventories;

use App\Repositories\Inventories\InventoryRepository;

class InventoryService
{
    protected InventoryRepository $inventoryRepository;
    public function __construct(InventoryRepository $inventoryRepository)
    {
        $this->inventoryRepository = $inventoryRepository;
    }

    public function getAll()
    {
        return $this->inventoryRepository->getAll();
    }

    public function updateStoke(array $data)
    {
        return $this->inventoryRepository
            ->updateStoke($data);
    }
}