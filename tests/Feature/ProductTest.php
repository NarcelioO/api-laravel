<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    use RefreshDatabase;



    public function test_get_products_authenticated(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'sanctum');
        $response = $this->getJson('/api/products');

        $response->assertStatus(200)
                    ->assertJsonStructure([
                        'data' => [
                            '*' => [
                                'id',
                                'name',
                                'description',
                                'price',
                                'created_at',
                                'updated_at'
                            ]
                        ],
                        'status',
                        'message'
                    ]);


    }

    public function test_post_product_authenticated():void
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'sanctum');
        $response = $this->postJson('/api/products',
        [
            'name' => "Ring of power",
            'type' => "ring",
            'rarity' => "rare",
            'requeriment' => "10",
            'description' => "A powerful ring",
            'price' => 1000,
            'effect' => "Grants invisibility"
        ]);

        $response->assertStatus(201)
                    ->assertJsonStructure([
                        'data' => [
                            'id',
                            'nome',
                            'tipo',
                            'preço'

                        ],
                        'message'
                    ]);
        $this->assertDatabaseHas('products', [
            'name' => 'Ring of power',
            'type' => 'ring',
            'rarity' => 'rare',
            'requeriment' => '10',
            'description' => 'A powerful ring',
            'price' => 1000,
            'effect' => 'Grants invisibility'
        ]);
    }
}
