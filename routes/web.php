<?php

use App\Http\Controllers\frontendcontroller;
use Illuminate\Support\Facades\Route;


Route::get('/about',[frontendcontroller::class,'about']);
Route::get('/cart',[frontendcontroller::class,'cart']);
Route::get('/checkout',[frontendcontroller::class,'checkout']);
Route::get('/index',[frontendcontroller::class,'index']);
Route::get('/products',[frontendcontroller::class,'products']);
Route::get('/single_product/{id}',[frontendcontroller::class,'single_product'])->name('single_product');
Route::post('/add to cart',[frontendcontroller::class,'add_to_cart'])->name('add_to_cart');
