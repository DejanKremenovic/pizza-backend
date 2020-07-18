<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductService;

class ProductController extends Controller
{
    function __construct()
    {
        // Inject service
        $this->service = new ProductService();
    }

    /**
     * Get paginated product list
     * @param Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function getProducts(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $fields = ['id', 'name', 'price', 'image'];
        $products = $this->service->getPaginated($fields, $perPage);
        return response()->json($products);
    }

    /**
     * Get single product
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function getSingle(int $id)
    {
        $product = $this->service->findById($id);
        return response()->json($product);
    }
}
