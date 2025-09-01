<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'sku',
        'name',
        'description',
        'cost_price',
        'sale_price'
    ];


    protected $casts = [
        'cost_price' => 'decimal:2',
        'sale_price' => 'decimal:2',
    ];


    public function inventory()
    {
        return $this->hasOne(Inventory::class);
    }


    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }
}
