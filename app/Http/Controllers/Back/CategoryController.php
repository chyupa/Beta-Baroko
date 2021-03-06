<?php

namespace App\Http\Controllers\Back;

use App\Baroko\Category\Repository\CategoryRepository;
use App\Http\Controllers\Controller;

/**
 * Class CategoryController
 * @package App\Http\Controllers\Back
 */
class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     */
    protected $categoryRepo;

    /**
     * CategoryController constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository) {
        $this->categoryRepo = $categoryRepository;
    }

    /**
     * Get all categories
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCategories() {
        $categories = $this->categoryRepo->getAllCategories();

        return response()->json(['success' => $categories]);
    }

    /**
     * Get single category
     *
     * @param $categorySlug
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCategory($categorySlug) {
        $category = $this->categoryRepo->getCategoryBySlug($categorySlug);

        return response()->json(['success' => $category]);
    }

    /**
     * Get all products for this category
     *
     * @param $subcategorySlug
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSubcategoryProducts($subcategorySlug) {
        $subcategory = $this->categoryRepo->getSubcategoryBySlug($subcategorySlug);

        return response()->json(['success' => $subcategory]);
    }
}