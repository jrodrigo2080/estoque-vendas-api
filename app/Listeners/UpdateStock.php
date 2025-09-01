<?php

namespace App\Listeners;

use App\Events\SaleFinalized;
use App\Models\Inventory;
use App\Models\SaleItem;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateStock
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SaleFinalized $event): void
    {
        $sale = $event->sale;
        $saleItems = SaleItem::where('sale_id', $sale->id)->get();
        
        foreach ($saleItems as $item) {
            Inventory::where('product_id', $item->product_id)
                ->decrement('quantity', $item->quantity);
        }
    }
}
