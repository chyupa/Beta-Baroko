<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class CartController extends Controller
{
    public function addToCart(Request $request) {
//        dd(session()->getId());
//        dd($request->all());

        return response()->json(['success', 'Product added to cart!']);
    }
}