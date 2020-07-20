<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class OrdersTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->products = factory(Product::class, 3)->create();
        $this->orderData = [
            'products' => [
                [
                    'id' => $this->products->first()->id,
                    'amount' => 1
                ]
            ],
            'name' => 'Exmple name',
            'address' => 'Example address',
            'phone' => '00123123123'
        ];
    }  

    /**
     * Order data
     * @var array
     */
    private $orderData;

    /**
     * Assert that user can order.
     *
     * @return void
     */
    public function testUserCanOrder()
    {
        $response = $this->json('POST', '/api/v1/orders', $this->orderData);
        $response->assertStatus(200);
        $responseArray = json_decode($response->getContent());
        $this->assertEquals(['message' => __('success.order-stored')], (array)$responseArray);
        $this->assertDatabaseCount('orders', 1);
    }

    /**
     * Assert that user can not order without entering address
     *
     * @return void
     */
    public function testUserCanNotOrderValidationFail()
    {
        unset($this->orderData['address']);
        $response = $this->json('POST', '/api/v1/orders', $this->orderData);
        $response->assertStatus(422);
        $this->assertDatabaseCount('orders', 0);
    }
}
