<?php

namespace App\Http\Controllers\Frontend;

use App\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(){

    }

    public function cart(){
        return view('frontend.cart.cartpage');
    }

    
}
