<?php

namespace App\Baroko\OrderInfo\Repository;

use App\Baroko\BarokoRepository;
use App\Baroko\OrderInfo\Model\OrderInfo;

class OrderInfoRepository extends BarokoRepository
{
    protected $model;

    public function __construct(OrderInfo $orderInfo) {
        $this->model = $orderInfo;
    }
}