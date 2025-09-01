<?php

namespace App\Services\Products;

use App\Repositories\Products\ProductRepository;

class ProductService
{
    protected ProductRepository $productRepository;
    
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getById(int $id)
    {
        return $this->productRepository->findById($id);
    }
}