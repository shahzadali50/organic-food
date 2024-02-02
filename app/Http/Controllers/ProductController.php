<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class ProductController extends Controller

{
    public function index()
    {
        $products = Product::all();
        Flashy::message('Welcome To Home Page');
        return view('home',compact('products'));

    }


}
