<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct()
    {

    }

    public function getHome()
    {
        return view('front.homepage');
    }
}