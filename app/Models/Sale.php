<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_amount',
        'total_cost',
        'total_profit',
        'status'
    ];


    protected $casts = [
        'total_amount' => 'decimal:2',
        'total_cost' => 'decimal:2',
        'total_profit' => 'decimal:2',
    ];


    public function items()
    {
        return $this->hasMany(SaleItem::class);
    }
}
