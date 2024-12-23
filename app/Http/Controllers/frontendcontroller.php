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
        $products = products::all();
        return view('index', ['products' => $products]);
    }
    function products()
    {
        return view('products');
    }
    function single_product($id)
    {
        $products = products::find($id);
        return view('single_product', ['products' => $products]);
    }
    function remove_from_cart(Request $request)
    {
        $cart=$request->session()->get('cart');
        $id_to_delete=$request->id;
        unset($cart[$id_to_delete]);
        $request->session()->put('cart',$cart);
        return redirect()->back()->withErrors(['message'=>'Cart item deleted sucessfully.']);
    }
    function add_to_cart(REQUEST $request)
    {
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
            $product_ids = array_column($cart, 'id');
            if (!in_array($request->id,$product_ids)) {
                $id = $request->id;
                $name = $request->name;
                $image = $request->image;
                $quantity = $request->quantity;
                ($request->sellprice != null) ? $price = $request->sellprice : $price = $request->price;
                $product_array= array(
                    'id' => $id,
                    'name' => $name,
                    'image' => $image,
                    'quantity' => $quantity,
                    'price' => $price
                );
                $cart[$request->id] = $product_array;
                $request->session()->put('cart', $cart);
                return view('cart');
            }
            else
            {
                return redirect()->back()->withErrors(['message'=>'product already added to cart']);
            }
        }
        else {
            $id = $request->id;
            $name = $request->name;
            $image = $request->image;
            $quantity = $request->quantity;
            ($request->sellprice != null) ? $price = $request->sellprice : $price = $request->price;
            $product_array = array(
                'id' => $id,
                'name' => $name,
                'image' => $image,
                'quantity' => $quantity,
                'price' => $price
            );
            $cart[$request->id] = $product_array;
            $request->session()->put('cart', $cart);
            return view('cart');
        }
    }
    function add_quantity(Request $request)
    {
        $cart=$request->session()->get('cart');
        $id=$request->id;
        $cart[$id]['quantity']=$request->quantity;
        $request->session()->put('cart',$cart);
        return redirect()->back();
    }
}
