<?php

namespace App\Baroko\Product\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App\Baroko\Product\Model
 */
class Product extends Model
{
    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @var array
     */
    protected $fillable = ['category_id', 'name', 'url', 'type', 'public'];

    /**
     * Info Relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function info() {
        return $this->hasOne('App\Baroko\ProductInfo\Model\ProductInfo');
    }

    /**
     * Settings Relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function settings() {
        return $this->hasOne('App\Baroko\ProductSettings\Model\ProductSettings');
    }

    /**
     * Prices Relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function prices() {
        return $this->hasOne('App\Baroko\ProductPrices\Model\ProductPrices');
    }

    /**
     * Outlet Relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function outlet() {
        return $this->hasOne('App\Baroko\ProductOutlet\Model\ProductOutlet');
    }

    /**
     * Category Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category() {
        return $this->belongsTo('App\Baroko\Category\Model\Category');
    }

}