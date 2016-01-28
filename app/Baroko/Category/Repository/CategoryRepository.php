<?php

namespace App\Baroko\Category\Repository;

use App\Baroko\BarokoRepository;
use App\Baroko\Category\Model\Category;

/**
 * Class CategoryRepository
 * @package App\Baroko\Category\Repository
 */
class CategoryRepository extends BarokoRepository
{
    /**
     * @var Category
     */
    protected $model;

    /**
     * CategoryRepository constructor.
     * @param Category $category
     */
    public function __construct(Category $category) {
        $this->model = $category;
    }

    /**
     * Get category with its subcategories by slug
     *
     * @param $categorySlug
     * @return mixed
     */
    public function getCategoryBySlug($categorySlug) {
        return $this->model
          ->with('subcategories')
          ->where('slug', $categorySlug)
          ->first();
    }

    /**
     * Get all categories with parent_id - 0
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllCategories() {
        return $this->model
          ->parent()
          ->get();
    }

    /**
     * Get subcategory with its products
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