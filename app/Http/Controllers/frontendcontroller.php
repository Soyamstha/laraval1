<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class frontendcontroller extends Controller
{
    function about()
    {
        return view('about');
    }
    function cart()
    {
        return view('cart');
    }
    function checkout()
    {
        return view('checkout');
    }
    function index()
    {
        return view('index');
    }
    function products()
    {
        return view('products');
    }
    function single_product()
    {
        return view('single_product');
    }
}
