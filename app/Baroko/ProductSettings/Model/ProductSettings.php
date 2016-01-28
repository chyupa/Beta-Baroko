<?php

namespace App\Baroko\ProductSettings\Model;

use Illuminate\Database\Eloquent\Model;

class ProductSettings extends Model
{
    /**
     * @var string
     */
    protected $table = 'product_settings';

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'featured', 'promotion', 'stock', 'outlet', 'designer_edition'];

    /**
     * Product Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Baroko\Product\Model\Product');
    }
}