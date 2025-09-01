<?php

namespace App\Services\Sales;

use App\Events\SaleFinalized;
use App\Repositories\Sales\SaleItemsRepository;
use App\Repositories\Sales\SalesRepository;
use App\Services\Products\ProductService;

class SalesService
{
    protected SalesRepository $salesRepository;
    protected SaleItemsRepository $saleItemsRepository;
    protected ProductService $productService;
    public function __construct(SalesRepository $salesRepository, SaleItemsRepository $saleItemsRepository, ProductService $productService)
    {
        $this->salesRepository = $salesRepository;
        $this->saleItemsRepository = $saleItemsRepository;
        $this->productService = $productService;
    }

    public function findById(int $id)
    {
        return $this->salesRepository->findById($id);
    }

    public function store(array $data) {
        $totalAmount = 0;
        $totalCost = 0;
        $totalProfit = 0;
        foreach ($data['items'] as $item) {
            $product = $this->productService->getById($item['product_id']);
            $totalAmount += $item['quantity'] * $item['amount'];
            $totalCost += $item['quantity'] * $product->cost_price;
            $totalProfit += ($item['quantity'] * $item['amount']) - ($item['quantity'] * $product->cost_price);
        }

        $sale = $this->salesRepository->create([
            'total_amount' => $totalAmount,
            'total_cost' => $totalCost,
            'total_profit' => $totalProfit,
            'status' => 'completed'
        ]);

        if($sale){
            foreach ($data['items'] as $item) {
                $this->saleItemsRepository->create([
                    'sale_id' => $sale->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['amount'],
                    'unit_cost' =>  $item['amount'] - $this->productService->getById($item['product_id'])->cost_price ?? 0,
                ]);
            }
        }

        event(new SaleFinalized($sale));
    }
}
