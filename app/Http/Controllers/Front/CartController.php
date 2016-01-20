<?php

namespace App\Http\Controllers\Front;

use App\Baroko\SessionCart\Repository\SessionCartRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

/**
 * Class CartController
 * @package App\Http\Controllers\Front
 */
class CartController extends Controller
{
    protected $sessionCartRepo;

    public function __construct(SessionCartRepository $sessionCartRepository) {
        $this->sessionCartRepo = $sessionCartRepository;
    }

    /**
     * Get Cart Page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCartPage() {
        \Log::info('get cart page');
        return view('front.cart');
    }
}