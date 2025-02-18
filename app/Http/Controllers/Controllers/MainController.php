<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function about_us()
    {
        return view('about-us');
    }
    public function products()
    {
        $products = Product::all();


        return view('products', compact('products'));

    }
    public function not_show()
    {
        return view('404');
    }
    public function contact_us()
    {
        return view('contact-us');
    }
    public function testimonial()
    {
        return view('testimonial');
    }
    public function features()
    {
        return view('features');
    }

}
