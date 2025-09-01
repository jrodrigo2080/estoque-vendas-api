<?php

namespace App\Repositories\Sales;

use App\Models\Sale;

class SalesRepository
{
   protected Sale $sale;
   public function __construct(Sale $sale)
   {
       $this->sale = $sale;
   }

   public function findById(int $id)
   {
       return $this->sale->with('items')
        ->find($id);
   }

    public function create(array $data)
    {
         return $this->sale->create($data);
    }
}