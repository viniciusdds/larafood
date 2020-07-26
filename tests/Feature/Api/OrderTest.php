<?php

namespace Tests\Feature\Api;

use App\Models\Product;
use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * Validation Create New Order
     *
     * @return void
     */
    public function testValidationCreateNewOrder()
    {   
        $payload = [];

        $response = $this->postJson('/api/v1/orders', $payload);

        $response->assertStatus(422)
                    ->assertJsonPath('errors.token_company', [
                        trans('validation.required', ['attribute' => 'token company'])
                    ])
                    ->assertJsonPath('errors.products', [
                        trans('validation.required', ['attribute' => 'products'])
                    ]);
    }

    /**
     * Create New Order
     *
     * @return void
     */
    public function testCreateNewOrder()
    {  
        $tenant = factory(Tenant::class)->create();
        
        $payload = [
            'token_company' => $tenant->uuid,
            'products' => [],
        ];

        $products = factory(Product::class, 10)->create();
        foreach ($products as $product) {
            array_push($payload['products'], [
                'identify' => $product->uuid,
                'qty' => 2,
            ]);
        }

        $response = $this->postJson('/api/v1/orders', $payload);

        $response->assertStatus(201);
    }

     /**
     * Total New Order
     *
     * @return void
     */
    public function testTotalOrder()
    {  
        $tenant = factory(Tenant::class)->create();
        
        $payload = [
            'token_company' => $tenant->uuid,
            'products' => [],
        ];

        $products = factory(Product::class, 2)->create();
        foreach ($products as $product) {
            array_push($payload['products'], [
                'identify' => $product->uuid,
                'qty' => 1,
            ]);
        }

        $response = $this->postJson('/api/v1/orders', $payload);
        $response->dump();

        $response->assertStatus(201)
                        ->assertJsonPath('data.total', 25.8);
    }
}
