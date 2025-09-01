<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Resources\InventoryResource;
use App\Services\Inventories\InventoryService;
use App\Services\Products\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    protected InventoryService $inventoryService;
    protected ProductService $productService;

    public function __construct(InventoryService $inventoryService, ProductService $productService)
    {
        $this->inventoryService = $inventoryService;
        $this->productService = $productService;
    }

    public function getAll()
    {
        $inventories = $this->inventoryService->getAll();
        if (!$inventories) {
            return response()->json(['message' => 'No inventories found'], 404);
        }

        return response()->json(InventoryResource::collection($inventories));
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:0'
        ]);

        try {
            DB::beginTransaction();
            $inventory = $this->inventoryService
                ->updateStoke($data);

            if (!$inventory) {
                return response()->json(['message' => 'Failed to create inventory'], 500);
            }

            DB::commit();
            $inventory = $this->inventoryService->getAll();
            return response()->json(InventoryResource::collection($inventory), 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage()], 500);
        }
    }
}
