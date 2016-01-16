<?php

namespace App\Http\Controllers\Front;

use App\Baroko\Product\Repository\ProductRepository;
use App\Http\Controllers\Controller;

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
     * Get single product by URL
     *
     * @param $url
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSingleProduct($url) {
        $product = $this->productRepo->findByUrl($url);

        return view('front.product');
    }

}