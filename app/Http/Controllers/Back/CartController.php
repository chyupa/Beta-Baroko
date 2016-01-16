<?php

namespace App\Http\Controllers\Back;

use App\Baroko\Product\Repository\ProductRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class CartController
 * @package App\Http\Controllers\Back
 */
class CartController extends Controller
{
    /**
     * @var ProductRepository
     */
    private $productRepo;

    /**
     * CartController constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository) {
        $this->productRepo = $productRepository;
    }

    /**
     * Add product and quantity to cart
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addToCart(Request $request) {

        //get the product by url
        $product = $this->productRepo->findByUrl($request->get('url'));

        //return success
        return response()->json(['success' => 'Product added to cart!']);
    }
}