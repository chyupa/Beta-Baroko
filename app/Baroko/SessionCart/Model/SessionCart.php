<?php

namespace App\Baroko\SessionCart\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SessionCart
 * @package App\Baroko\SessionCart\Model
 */
class SessionCart extends Model
{
    /**
     * @var string
     */
    protected $table = 'sessions_cart';

    /**
     * @var array
     */
    protected $fillable = ['session_id', 'product_id', 'price', 'quantity'];
}