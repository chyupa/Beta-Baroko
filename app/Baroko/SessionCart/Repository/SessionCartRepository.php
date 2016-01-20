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
}