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
    protected $table = 'categories_subcategories';

    /**
     * @var array
     */
    protected $fillable = ['name', 'parent_id'];

    /**
     * Subcategories Relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subcategories() {
        return $this->hasMany('App\Baroko\Category\Model\Category', 'parent_id');
    }

    /**
     * Products Relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function category() {
        return $this->belongsTo('App\Baroko\Category\Model\Category', 'parent_id');
    }

    public function products() {
        return $this->hasMany('App\Baroko\Product\Model\Product');
    }
    
    public function scopeParent($query) {
        return $query->where('parent_id', 0);
    }
}