<?php

namespace App\Http\ViewComposers;

use App\Baroko\SessionCart\Repository\SessionCartRepository;
use Illuminate\View\View;

class CartComposer
{
    protected $sessionCartRepo;

    public function __construct(SessionCartRepository $sessionCartRepository) {
        $this->sessionCartRepo = $sessionCartRepository;
    }

    public function compose(View $view) {
        $sessionId = session()->getId();
        $sessionCartItems = $this->sessionCartRepo->getCartItemsNumber($sessionId);

        $sessionCart = $this->sessionCartRepo->getCartBySessionId($sessionId);
        $totals = $this->sessionCartRepo->calculateTotalBySessionId($sessionCart);

        $view
          ->with('cart_items_number', $sessionCartItems)
          ->with('cart_items_transport_fee', $totals['transportFee'])
          ->with('cart_items_total', $totals['total']);
    }
}