<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;

class AppController extends Controller
{
    public function index(){
        $products = Product::get();
        $categories = Category::get();
        return view('layouts.index', compact('products', 'categories'));
    }

    

    public function about(){
        return view('about-us');
    }

    public function contact(){
        return view('contact-us');
    }
}
