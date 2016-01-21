<?php

namespace App\Baroko\OrderInfo\Model;

use Illuminate\Database\Eloquent\Model;


/**
 * Class OrderInfo
 * @package App\Baroko\OrderInfo\Model
 */
class OrderInfo extends Model
{
    /**
     * @var string
     */
    protected $table = 'orders_info';

    /**
     * @var array
     */
    protected $fillable = ['order_id', 'email', 'name', 'number', 'scara', 'apartment', 'city', 'country', 'message', 'phone', 'street', 'bloc', 'floor', 'interphone', 'county'];

    /**
     * @return mixed
     */
    public function order() {
        return $this->belongsTo('App\Baroko\Order\Model\Order');
    }
}