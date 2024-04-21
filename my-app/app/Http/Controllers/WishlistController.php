<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(){
        $wishlists = Wishlist::where('user_id', Auth::user()->id)->get();
        return view('whishlist', compact('wishlists'));
    }

    // Add product item to wishlst
    public function store(Request $request){
        // $product = Product::findorfail($request->id);
        $wishlists = Wishlist::where('user_id', Auth::user()->id)->get();
        if($wishlists->isEmpty()){
            Wishlist::create([
                'user_id' => Auth::user()->id,
                'product_id' => $request->id
            ]);
            return redirect()->back()->with('success', 'Added new product to your Wishlist !');
        }
        else{
            foreach($wishlists as $wishlist){
                if($wishlist->product_id == $request->id){
                    $isFind = 1;
                }else{
                    $isFind = 0;
                }
            }
                if($isFind == 0){
                    Wishlist::create([
                        'user_id' => Auth::user()->id,
                        'product_id' => $request->id
                    ]);
                return redirect()->back()->with('success', 'Added new product to your Wishlist !');

                }else{
                    return redirect()->back()->with('warning', 'This product already exist in your Wishlist!');
                }
        }
    }

    // Add product item to cart
    public function storeToCart(Request $request){
        $product = Product::findorfail($request->id);
        $price = $product->sale_price ? $product->sale_price : $product->regular_price;
        $carts = Cart::where('user_id', Auth::user()->id)->get();

        foreach($carts as $cart){
            if($cart->product_id == $product->id){
                $cart->update([
                    'quantity_ordered' => ($cart->quantity_ordered + $request->quantity_ordered),
                    'total_price'      => ($cart->total_price + ($price * $request->quantity_ordered)),
                ]);
                Wishlist::where('product_id', $product->id)->delete();
                return redirect()->back()->with('success', 'Added new product to your Cart !');
            } 
        }
            if($product->stock_status == 'instock'){
                Cart::create([
                    'quantity_ordered' => $request->quantity_ordered,
                    'total_price' => $price * $request->quantity_ordered,
                    'user_id' => Auth::user()->id,
                    'product_id' => $product->id,
                ]);
                Wishlist::where('product_id', $product->id)->delete();
                return redirect()->back()->with('success', 'Added new product to your Cart !');
            }else{
                return redirect()->back()->with('error', 'Please try again later, This product is off stock right now !');
            }
    }

    // delete item from your wishlist
    public function destroy($id)
    {
        Wishlist::findorFail($id)->delete();
        return redirect()->back()->with('success', 'Delete product from your wishlist is Done !');
    }
}
