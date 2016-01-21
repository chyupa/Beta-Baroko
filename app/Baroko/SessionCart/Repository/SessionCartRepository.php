<?php

namespace App\Baroko\SessionCart\Repository;

use App\Baroko\BarokoRepository;
use App\Baroko\SessionCart\Model\SessionCart;

/**
 * Class SessionCartRepository
 * @package App\Baroko\SessionCart\Repository
 */
class SessionCartRepository extends BarokoRepository
{
    /**
     * @var SessionCart
     */
    protected $model;

    /**
     * SessionCartRepository constructor.
     * @param SessionCart $sessionCart
     */
    public function __construct(SessionCart $sessionCart) {
        $this->model = $sessionCart;
    }

    /**
     * Update cart
     *
     * @param $sessionData
     * @param $sessionCartId
     * @return mixed
     */
    public function updateCart($sessionData, $sessionCartId) {
        return $this->model
          ->where('id', $sessionCartId)
          ->update($sessionData);
    }

    /**
     * Check if session id and product id are already in the database
     * return model
     *
     * @param $sessionId
     * @param $productId
     * @return mixed
     */
    public function findBySessionIdAndProductId($sessionId, $productId) {
        return $this->model
          ->where('session_id', $sessionId)
          ->where('product_id', $productId)
          ->first();
    }

    /**
     * Get cart contents by session id
     *
     * @param $sessionId
     * @return mixed
     */
    public function getCartBySessionId($sessionId) {
        return $this->model
          ->with('product')
          ->where('session_id', $sessionId)
          ->get();
    }

    /**
     * Get the cart items number
     * How many items the user has in cart
     *
     * @param $sessionId
     * @return mixed
     */
    public function getCartItemsNumber($sessionId) {
        return $this->model
          ->where('session_id', $sessionId)
          ->count();
    }

    /**
     * Calculate cart total and transport fee by session id
     *
     * @param $sessionCart
     * @return array
     */
    public function calculateTotalBySessionId($sessionCart) {
        $total = 0;
        foreach ($sessionCart as $item) {
            $total += $item->quantity * $item->price;
        }

        $transportFee = $this->calculateTransportFee($total);

        return [
            'total' => $total,
            'transportFee' => $transportFee
        ];
    }

    /**
     * Calculate transport fee based on total
     *
     * @param $total
     * @return float|int
     */
    private function calculateTransportFee($total) {
        if ($total < 300) {
            $transportFee = 22.5;
        } elseif ($total < 700) {
            $transportFee = 9;
        } else {
            $transportFee = 0;
        }

        return $transportFee;
    }
}