<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
    Route::group([
      'namespace' => 'Front',
    ], function () {
        Route::get('/', ['uses' => 'FrontController@getHome', 'as' => 'front.get.home']);


        //TODO: uncomment this line when I implement the Categories/Subcategories logic
//        Route::get('categories', ['uses' => 'CategoryController@getCategories', 'as' => 'front.get.categories']);

        Route::get('cart', ['uses' => 'FrontController@getCartPage', 'as' => 'front.get.cart']);

        Route::get('checkout', ['uses' => 'FrontController@getCheckout', 'as' => 'front.get.checkout']);

        Route::get('thank-you', ['uses' => 'FrontController@getThankYou', 'as' => 'front.get.thankYou']);

        Route::get('categories', ['uses' => 'FrontController@getCategories', 'as' => 'front.get.categories']);

        // Keep in mind that this needs to be the last route in this group otherwise the other ones will return 404
        Route::get('{url}', ['uses' => 'ProductController@getSingleProduct', 'as' => 'front.get.singleProduct']);

    });
});

Route::group([
  'prefix' => 'api',
  'namespace' => 'Back',
  'middleware' => ['web']
], function () {
    Route::get('getPublicProducts', ['uses' => 'ProductController@getPublicProducts', 'as' => 'back.get.publicProducts']);

    Route::get('getProduct/{url}', ['uses' => 'ProductController@getProduct', 'as' => 'back.get.product']);

    Route::post('addToCart', ['uses' => 'CartController@addToCart', 'as' => 'back.post.addToCart']);

    Route::get('getCartContents', ['uses' => 'CartController@getCartContents', 'as' => 'back.get.cartContents']);

    Route::post('removeCartItem', ['uses' => 'CartController@removeCartItem', 'as' => 'back.post.removeCartItem']);

    Route::post('updateCartQuantity', ['uses' => 'CartController@updateCartQuantity', 'as' => 'back.post.updateCartQuantity']);

    Route::post('placeOrder', ['uses' => 'OrderController@placeOrder', 'as' => 'back.post.placeOrder']);

    Route::get('getCategories', ['uses' => 'CategoryController@getCategories', 'as' => 'back.get.categories']);
});
