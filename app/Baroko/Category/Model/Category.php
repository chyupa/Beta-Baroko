<?php

namespace App\Baroko\Category\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App\Baroko\Category\Model
 */
class Category extends Model
{
    /**
     * @var string
     */
    protected $table = 'categories';

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subcategories() {
        return $this->hasMany('App\Baroko\Subcategory\Model\Subcategory');
    }

    public function products() {
        return $this->hasManyThrough('App\Baroko\Product\Model\Product', 'product_category_subcategory');
    }
}