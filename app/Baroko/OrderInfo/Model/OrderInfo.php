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
     * Order Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order() {
        return $this->belongsTo('App\Baroko\Order\Model\Order');
    }
}