<?php

namespace App\Http\Controllers\Back;

use App\Baroko\Order\Repository\OrderRepository;
use App\Baroko\OrderInfo\Repository\OrderInfoRepository;
use App\Baroko\SessionCart\Repository\SessionCartRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    protected $orderRepo;
    protected $orderInfoRepo;
    protected $sessionCartRepo;
    protected $notifications;

    public function __construct(OrderRepository $orderRepository,
                                OrderInfoRepository $orderInfoRepository,
                                SessionCartRepository $sessionCartRepository,
                                NotificationsController $notificationsController
    ) {
        $this->orderRepo = $orderRepository;
        $this->orderInfoRepo = $orderInfoRepository;
        $this->sessionCartRepo = $sessionCartRepository;
        $this->notifications = $notificationsController;
    }

    public function placeOrder(OrderRequest $request) {
        //get session id
        $sessionId = session()->getId();

        //get cart session
        $sessionCart = $this->sessionCartRepo->getCartBySessionId($sessionId);
        $cartTotals = $this->sessionCartRepo->calculateTotalBySessionId($sessionCart);

        //add cart session in the orders table
        $cartData = [
            'session_id' => $sessionId,
            'transportFee' => $cartTotals['transportFee'],
            'total' => $cartTotals['total']
        ];

        //get orders table id
        $order = $this->orderRepo->create($cartData);

        //add order info info
        $orderInfo = $this->orderInfoRepo->create($request->all());
        $order->info()->save($orderInfo);

        $this->notifications->sendOrderEmailToCustomer($order, $cartTotals);
        $this->notifications->sendOrderEmailToAdmin($order, $cartTotals);

        //generate a new session id
        session()->regenerate();

        //instead of response we will redirect to thank you page
        return response()->json(['success' => route('front.get.thankYou')]);
    }
}