<?php

namespace App\Baroko\Order\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App\Baroko\Order\Model
 */
class Order extends Model
{
    /**
     * @var string
     */
    protected $table = 'orders';

    /**
     * @var array
     */
    protected $fillable = ['session_id', 'total', 'transport_fee', 'discount'];
}