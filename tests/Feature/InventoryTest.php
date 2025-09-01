<?php

namespace Tests\Feature;

use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InventoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_inventories_when_they_exist()
    {
        $inventory = Inventory::factory()->create();

        $response = $this->getJson('/api/inventory');

        $response->assertStatus(200)
            ->assertJsonFragment([
                'id' => $inventory->id,
                'product_name' => $inventory->product->name,
                'quantity' => $inventory->quantity,
            ]);
    }
}
