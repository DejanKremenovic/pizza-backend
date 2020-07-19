<?php

namespace App\Services;
use App\Models\Product;
use App\Models\ProductOrder;
use App\Models\Order;

class OrderService {

    /**
     * This class is used to extract logic from controller to make some code parts reusable and to
     * add another level of abstraction to database layer 
     */

    /**
     * Store order from data array 
     * @param array $data
     * @return App\Models\Order
     */
    public function storeOrder($data)
    {
        $productService = new ProductService();
        $orderData = [
            'name' => $data['name'],
            'address' => $data['address'],
            'phone' => $data['phone']
        ];
        if(auth()->check()){
            $orderData['user_id'] = auth()->user()->id;
        }
        $order = Order::create($orderData);

        foreach($data['products'] as $item) {
            $product = $productService->findById($item['id']);
            ProductOrder::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'amount' => $item['amount'],
                'price' => $item['amount'] * $product->price
            ]);   
        }
        return $order;    
    }
}