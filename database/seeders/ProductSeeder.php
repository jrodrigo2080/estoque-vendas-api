<?php

namespace Database\Seeders;

use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['sku' => 'SKU-001', 'name' => 'Teclado Mecânico', 'description' => 'ABNT2', 'cost_price' => 150.00, 'sale_price' => 299.90],
            ['sku' => 'SKU-002', 'name' => 'Mouse Gamer', 'description' => 'RGB', 'cost_price' => 80.00, 'sale_price' => 179.90],
            ['sku' => 'SKU-003', 'name' => 'Monitor 24"', 'description' => 'IPS 75Hz', 'cost_price' => 600.00, 'sale_price' => 899.90],
            ['sku' => 'SKU-004', 'name' => 'Headset', 'description' => '7.1', 'cost_price' => 120.00, 'sale_price' => 249.90],
            ['sku' => 'SKU-005', 'name' => 'Webcam FullHD', 'description' => '1080p', 'cost_price' => 90.00, 'sale_price' => 199.90],
        ];


        foreach ($items as $data) {
            $product = Product::create($data);
            Inventory::create([
                'product_id' => $product->id,
                'quantity' => 50,
                'last_updated' => now(),
            ]);
        }
    }
}
