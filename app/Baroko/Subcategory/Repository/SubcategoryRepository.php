<?php

namespace App\Baroko\Subcategory\Repository;

use App\Baroko\BarokoRepository;
use App\Baroko\Subcategory\Model\Subcategory;

/**
 * Class SubcategoryRepository
 * @package App\Baroko\Subcategory\Repository
 */
class SubcategoryRepository extends BarokoRepository
{
    /**
     * @var Subcategory
     */
    protected $model;

    /**
     * SubcategoryRepository constructor.
     * @param Subcategory $subcategory
     */
    public function __construct(Subcategory $subcategory) {
        $this->model = $subcategory;
    }

    /**
     * Get subcategory with products by slug
     *
     * @param $subcategorySlug
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function getSubcategoryBySlug($subcategorySlug) {
        return $this->model
          ->with('products.prices')
          ->where('slug', $subcategorySlug)
          ->first();
    }
}