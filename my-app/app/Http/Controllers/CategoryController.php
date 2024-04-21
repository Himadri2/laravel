<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($id){
        $category = Category::find($id);
        $categories = Category::get();
        $brands = Brand::get();
        $products = Product::where('category_id', $category->id)->get();
        return view('categoryproduct', compact('category','products','categories', 'brands'));
    }
}
