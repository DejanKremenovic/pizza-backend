<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class ProductsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Collection of products
     */
    private $products;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->products = factory(Product::class, 3)->create();
    }    
    
    /**
     * Assert that user can see paginated list of products.
     *
     * @return void
     */
    public function testUserCanSeeListOfAllProducts()
    {
        $response = $this->get('/api/v1/products');

        $response->assertStatus(200);
        $responseArray = json_decode($response->getContent());
        $this->assertEquals(count($responseArray->data), 3);
    }

        
    /**
     * Assert that user get empty data when he tries with wrong page number.
     *
     * @return void
     */
    public function testUserCanNotSeeListOfAllProductsPageNumberDoesNotExist()
    {
        $response = $this->get('/api/v1/products?page=5');

        $response->assertStatus(200);
        $responseArray = json_decode($response->getContent());
        $this->assertEquals(count($responseArray->data), 0);
    }

            
    /**
     * Assert that user can see single product.
     *
     * @return void
     */
    public function testUserCanSeeSingleProduct()
    {
        $product = $this->products->first();
        $response = $this->get("/api/v1/products/$product->id");
        $response->assertStatus(200);
        $responseArray = json_decode($response->getContent());
        $this->assertEquals($responseArray->id, $product->id);
    }
                
    /**
     * Assert that user get 404 when id is wrong.
     *
     * @return void
     */
    public function testUserCanNotSeeSingleProductWrondId()
    {
        $product = $this->products->first();
        $response = $this->get("/api/v1/products/0123456");
        $response->assertStatus(404);
    }
}
