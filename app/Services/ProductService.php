<?php

namespace App\Services;
use App\Models\Product;

class ProductService {

    /**
     * This class is used to extract logic from controller to make some code parts reusable and to
     * add another level of abstraction to database layer 
     */

    /**
     * Get paginated list of products 
     * @param array $fields
     * @param int $perPage
     * @return Illuminate\Support\Collection
     */
    public function getPaginated(array $fields = ['*'], int $perPage = 10)
    {
        $products = Product::select($fields)->simplePaginate($perPage); 
        return $products;    
    }

    /**
     * Return single product with all details
     * @param int $id
     * @return Illuminate\Support\Collection
     */
    public function findById(int $id)
    {
        $product = Product::findOrFail($id);
        return $product;    
    }
}