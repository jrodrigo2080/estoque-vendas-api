<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Services\Sales\SalesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    protected SalesService $salesService;
    public function __construct(SalesService $salesService)
    {
        $this->salesService = $salesService;
    }

    public function getById($id)
    {
        $sale = $this->salesService->findById($id);
        if (!$sale) {
            return response()->json(['message' => 'Sale not found'], 404);
        }
        return response()->json($sale);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $salesData = $request->all();
            $this->salesService->store($salesData);

            DB::commit();
            return response()->json(['message' => 'Sale created successfully'], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to create sale', 'message' => $e->getMessage()], 500);
        }
    }
}
