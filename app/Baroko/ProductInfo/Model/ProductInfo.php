<?php

namespace App\Baroko\ProductInfo\Model;

use Illuminate\Database\Eloquent\Model;

class ProductInfo extends Model
{
    /**
     * @var string
     */
    protected $table = 'product_info';

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'description', 'code', 'extension'];

    /**
     * Product Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Baroko\Product\Model\Product');
    }
}