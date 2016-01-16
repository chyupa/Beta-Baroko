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
    protected $fillable = ['name', 'url', 'type', 'public'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function info() {
        return $this->hasOne('App\Baroko\ProductInfo\Model\ProductInfo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function settings() {
        return $this->hasOne('App\Baroko\ProductSettings\Model\ProductSettings');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function prices() {
        return $this->hasOne('App\Baroko\ProductPrices\Model\ProductPrices');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function outlet() {
        return $this->hasOne('App\Baroko\ProductOutlet\Model\ProductOutlet');
    }

}