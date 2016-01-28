<?php

namespace App\Baroko\Subcategory\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Subcategory
 * @package App\Baroko\Subcategory\Model
 */
class Subcategory extends Model
{
    /**
     * @var string
     */
    protected $table = 'subcategories';

    /**
     * @var array
     */
    protected $fillable = ['name', 'slug'];

    /**
     * @var array
     */
    protected $appends = ['productsCount'];

    /**
     * Category Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category() {
        return $this->belongsTo('App\Baroko\Category\Model\Category');
    }

    /**
     * Product Relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products() {
        return $this->belongsToMany('App\Baroko\Product\Model\Product', 'products_subcategories');
    }

    /**
     * Accessor for the productsCount relation
     * Return the number of products for each subcategory
     *
     * @return int
     */
    public function getProductsCountAttribute() {
        return $this->products()->count();
    }
}