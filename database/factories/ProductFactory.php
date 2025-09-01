<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->text(200),
            'cost_price' => $this->faker->randomFloat(2, 1, 1000),
            'sale_price' => $this->faker->randomFloat(2, 1, 1000),
            'sku' => $this->faker->unique()->ean8(), // agora retorna string
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
