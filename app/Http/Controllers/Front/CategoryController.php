<?php

namespace App\Http\Controllers\Front;

/**
 * Class CategoryController
 * @package App\Http\Controllers\Front
 */
class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepo;

    /**
     * CategoryController constructor.
     *
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository) {
        $this->categoryRepo = $categoryRepository;
    }

    /**
     * Get all categories
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCategories() {
        return view('front.categories');
    }
}