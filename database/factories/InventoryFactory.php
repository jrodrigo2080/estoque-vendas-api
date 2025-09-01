<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
{

    protected $model = \App\Models\Inventory::class;

    public function definition(): array
    {
        return [
            'product_id' => \App\Models\Product::factory(),
            'quantity' => $this->faker->numberBetween(1, 100),
            'last_updated' => now(),
        ];
    }
}
