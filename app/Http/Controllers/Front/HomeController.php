<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

/**
 * Class HomeController
 * @package App\Http\Controllers\Front
 */
class HomeController extends Controller
{
    /**
     * HomeController constructor.
     */
    public function __construct()
    {

    }

    /**
     * Get Home Page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getHome()
    {
        return view('front.homepage');
    }
}