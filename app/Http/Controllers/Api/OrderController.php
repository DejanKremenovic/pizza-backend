<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\OrderRequest;
use App\Services\OrderService;

class OrderController extends Controller
{
    function __construct()
    {
        // Inject service
        $this->service = new OrderService();
    }

    public function storeOrder(OrderRequest $request)
    {
        $data = $request->post();
        $this->service->storeOrder($data);
        return response()->json(['message' => 'Thank you for ordering, your pizza will arrive soon.']);
    }
}
