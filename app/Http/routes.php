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
        Route::get('/', ['uses' => 'HomeController@getHome', 'as' => 'front.get.home']);

        Route::get('/{url}', ['uses' => 'ProductController@getSingleProduct', 'as' => 'front.get.singleProduct']);

        Route::get('/categories', ['uses' => 'CategoryController@getCategories', 'as' => 'front.get.categories']);
    });
});

Route::group([
  'prefix' => 'api',
  'namespace' => 'Back',
], function () {
    Route::get('getPublicProducts', ['uses' => 'ProductController@getPublicProducts', 'as' => 'back.get.publicProducts']);

    Route::get('getProduct/{url}', ['uses' => 'ProductController@getProduct', 'as' => 'back.get.product']);
});
