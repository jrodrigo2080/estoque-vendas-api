<?php

namespace App\Repositories\Sales;

use App\Models\SaleItem;

class SaleItemsRepository
{
   protected SaleItem $saleItem;
   public function __construct(SaleItem $saleItem)
   {
       $this->saleItem = $saleItem;
   }

    public function create(array $data)
    {
         return $this->saleItem->create($data);
    }
}