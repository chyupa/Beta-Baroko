<?php

namespace App\Baroko\ProductPrices\Model;

use Illuminate\Database\Eloquent\Model;

class ProductPrices extends Model
{
    /**
     * @var string
     */
    protected $table = 'product_prices';

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'old_price', 'price', 'discount'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Baroko\Product\Model\Product');
    }
}