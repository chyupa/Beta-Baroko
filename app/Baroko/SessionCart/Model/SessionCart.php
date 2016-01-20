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

    /**
     * @var array
     */
    protected $hidden = ['id', 'session_id', 'created_at', 'updated_at'];
}