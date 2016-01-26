<?php

namespace App\Http\Controllers\Back;

use App\Baroko\Subcategory\Repository\SubcategoryRepository;
use App\Http\Controllers\Controller;

/**
 * Class SubcategoryController
 * @package App\Http\Controllers\Back
 */
class SubcategoryController extends Controller
{
    /**
     * @var SubcategoryRepository
     */
    protected $subcategoryRepo;

    /**
     * SubcategoryController constructor.
     * @param SubcategoryRepository $subcategoryRepository
     */
    public function __construct(SubcategoryRepository $subcategoryRepository) {
        $this->subcategoryRepo = $subcategoryRepository;
    }

    /**
     * Get all products of this subcategory and return json
     *
     * @param $subcategorySlug
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSubcategoryProducts($subcategorySlug) {
        $products = $this->subcategoryRepo->getSubcategoryBySlug($subcategorySlug);

        return response()->json(['success' => $products]);
    }
}