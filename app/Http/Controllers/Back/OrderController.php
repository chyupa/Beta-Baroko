<?php

namespace App\Http\Controllers\Back;

use App\Baroko\Order\Repository\OrderRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    protected $orderRepo;

    public function __construct(OrderRepository $orderRepository) {
        $this->orderRepo = $orderRepository;
    }

    public function placeOrder(OrderRequest $request) {
        \Log::debug($request->all());

    }
}