<?php

namespace App\Baroko\ProductOutlet\Model;

use Illuminate\Database\Eloquent\Model;

class ProductOutlet extends Model
{
    /**
     * @var string
     */
    protected $table = 'product_outlet';

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'outlet_stock'];

    /**
     * Product Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Baroko\Product\Model\Product');
    }
}