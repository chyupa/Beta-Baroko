<?php

namespace App\Baroko\Subcategory\Model;

use Illuminate\Database\Eloquent\Model;

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
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category() {
        return $this->belongsTo('App\Baroko\Category\Model\Category');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products() {
        return $this->belongsToMany('App\Baroko\Product\Model\Product', 'products_subcategories');
    }
}