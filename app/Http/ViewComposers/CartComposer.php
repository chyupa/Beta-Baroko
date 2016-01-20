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

        return $view->with('cart_items_number', $sessionCartItems);
    }
}