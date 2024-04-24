<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index(Request $request){
        $allproducts = Product::get(); 
        $page = $request->query('page');
        $size = $request->query('size');
        $order = $request->query('order');
       

        if(!$page)
            $page = 1;
        
        if(!$size)
            $size = 12;
    
        if(!$order)
            $order = -1;

        $order_val = '';
        $column = '';

        switch($order){
            case 1: 
                $column = 'created_at';
                $order_val = 'DESC';
                break;
            case 2: 
                $column = 'created_at';
                $order_val = 'ASC';
                break;
            case 3:
                foreach($allproducts as $product){
                    if($product->sale_product == null){
                        $column = 'regular_price';
                        $order_val = 'ASC';
                    }else{
                        $column = 'sale_product';
                        $order_val = 'ASC';
                    }
                }
                break;
            case 4: 
                foreach($allproducts as $product){
                    if($product->sale_product == null){
                        $column = 'regular_price';
                        $order_val = 'DESC';
                    }else{
                        $column = 'sale_product';
                        $order_val = 'DESC';
                    }
                }
                break;
            default:
                $column = 'id';
                $order_val = 'DESC';
        }
        $brands = Brand::orderBy('name', 'ASC')->get();
        $brand_val= $request->query('brands');

        $categories= Category::orderBy('name', 'ASC')->get();
        $category_val = $request->query('categories');

        $products = Product::where(function($query) use ($brand_val){ 
                                $query->whereIn('brand_id', explode(',',$brand_val))->orWhereRaw("'".$brand_val."'=''");
                            })
                            ->where(function($query) use ($category_val){ 
                                $query->whereIn('category_id', explode(',',$category_val))->orWhereRaw("'".$category_val."'=''");
                            })->orderBy($column, $order_val)->paginate($size);
        return view('shop',['products'=>$products, 'page'=>$page, 'size'=>$size, 'order'=>$order, 'brands'=>$brands, 'brand_val'=>$brand_val, 'categories'=>$categories, 'category_val'=>$category_val]);
    }

    public function productDetails($slug){
        $product = Product::where('slug', $slug)->first();
        $products = Product::where('slug', '!=', $slug)->paginate(10);
        return view('productDetails', ['product' => $product, 'products' => $products]);
    }

    public function sale_product(){
        $products = Product::get();
        return view('layouts.index', compact('products'));
    }
    
}
