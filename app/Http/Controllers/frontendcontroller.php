<?php

namespace App\Http\Controllers;

use App\Models\products;
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
        $products=products::all();
        return view('index',['products'=>$products]);
    }
    function products()
    {
        return view('products');
    }
    function single_product($id)
    {
        $products=products::find($id);
        return view('single_product',['products'=>$products]);
    }
}
