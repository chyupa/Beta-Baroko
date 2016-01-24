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
}