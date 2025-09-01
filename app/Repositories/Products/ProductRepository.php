<?php

namespace App\Repositories\Products;

use App\Models\Product;

class ProductRepository
{
    protected Product $product;
    
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function findById(int $id)
    {
        return $this->product->find($id);
    }
}
