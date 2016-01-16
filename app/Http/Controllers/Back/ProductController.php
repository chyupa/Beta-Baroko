<?php

namespace App\Http\Controllers\Back;

use App\Baroko\Product\Repository\ProductRepository;
use App\Http\Controllers\Controller;

/**
 * Class ProductController
 * @package App\Http\Controllers\Back
 */
class ProductController extends Controller
{
    /**
     * @var ProductRepository
     */
    private $productRepo;

    /**
     * ProductController constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository) {
        $this->productRepo = $productRepository;
    }

    /**
     * Get all products
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPublicProducts() {
        //get all public products
        $products = $this->productRepo->getPublicProductsWithAll();

        //return response
        return response()->json(['success' => 'Products retrieved', 'products' => $products]);
    }

    /**
     * Get product info
     *
     * @param $url
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProduct($url) {
        $product = $this->productRepo->findByUrl($url);

        return response()->json(['product' => $product]);
    }

}