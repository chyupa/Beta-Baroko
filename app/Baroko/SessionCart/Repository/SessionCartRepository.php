<?php

namespace App\Baroko\SessionCart\Repository;

use App\Baroko\SessionCart\Model\SessionCart;

/**
 * Class SessionCartRepository
 * @package App\Baroko\SessionCart\Repository
 */
class SessionCartRepository
{
    /**
     * @var SessionCart
     */
    private $model;

    /**
     * SessionCartRepository constructor.
     * @param SessionCart $sessionCart
     */
    public function __construct(SessionCart $sessionCart) {
        $this->model = $sessionCart;
    }

    /**
     * Store to DB
     *
     * @param $sessionData
     * @return static
     */
    public function addToCart($sessionData) {
        return $this->model->create($sessionData);
    }

    /**
     * Update cart
     *
     * @param $sessionData
     * @param $sessionCartId
     * @return mixed
     */
    public function updateCart($sessionData, $sessionCartId) {
//        dd($sessionCart);
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
}