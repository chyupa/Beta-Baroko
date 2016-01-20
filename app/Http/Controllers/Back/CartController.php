<?php

namespace App\Http\Controllers\Back;

use App\Baroko\Product\Repository\ProductRepository;
use App\Baroko\SessionCart\Repository\SessionCartRepository;
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
     * @var SessionCartRepository
     */
    private $sessionCartRepo;

    /**
     * @var Session ID
     */
    private $sessionId;

    /**
     * CartController constructor.
     * @param ProductRepository $productRepository
     * @param SessionCartRepository $sessionCartRepository
     */
    public function __construct(
        ProductRepository $productRepository,
        SessionCartRepository $sessionCartRepository
    ) {
        $this->productRepo = $productRepository;
        $this->sessionCartRepo = $sessionCartRepository;

        $this->sessionId = session()->getId();
    }

    /**
     * Add product and quantity to cart
     *
     * TODO: check if the session_id and product_id exist in order to update and not create a new record
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addToCart(Request $request) {

        //get the product by url
        $product = $this->productRepo->findByUrl($request->get('url'));

        //create an array to store sessionCart data
        $sessionCartData = [
            'session_id' => $this->sessionId,
            'product_id' => $product->id,
            'price' => $request->get('price'),
            'quantity' => $request->get('quantity')
        ];

        // check if current user has this product in cart and update it
        $sessionCart = $this->sessionCartRepo->findBySessionIdAndProductId($this->sessionId, $product->id);
        if ($sessionCart) {
            $sessionCart->update($sessionCartData);

            return response()->json(['success' => 'Cart updated']);
        }

        //save cart
        $this->sessionCartRepo->create($sessionCartData);

        //return success
        return response()->json(['success' => 'Product added to cart!']);
    }

    /**
     * Get cart contents
     *
     * @return mixed
     */
    public function getCartContents() {
        //get sesison id
        $sessionId = session()->getId();

        //find products in cart by session id
        $cartSession = $this->sessionCartRepo->getCartBySessionId($sessionId);

        return response()->json($cartSession);
    }

    /**
     * Remove sessionCart instance from DB
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeCartItem(Request $request) {
        //get product by url
        $product = $this->productRepo->findByUrl($request->get('url'));

        //get a sessionCart instance
        $sessionCart = $this->sessionCartRepo->findBySessionIdAndProductId($this->sessionId, $product->id);

        //destroy it
        $this->sessionCartRepo->destroy($sessionCart->id);

        //return response
        return response()->json(['success' => 'Item removed from cart']);
    }

    /**
     * Change item cart quantity
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateCartQuantity(Request $request) {
        //get product by url
        $product = $this->productRepo->findByUrl($request->get('url'));

        //get session cart instance
        $sessionCart = $this->sessionCartRepo->findBySessionIdAndProductId($this->sessionId, $product->id);

        //update the new quantity
        $sessionCart->update($request->all());

        //return response
        return response()->json(['success' => 'Cart item quantity updated']);
    }
}