<?php

namespace App\Baroko\Order\Repository;

use App\Baroko\BarokoRepository;
use App\Baroko\Order\Model\Order;

class OrderRepository extends BarokoRepository
{
    protected $model;

    public function __construct(Order $order) {
        $this->model = $order;
    }
}