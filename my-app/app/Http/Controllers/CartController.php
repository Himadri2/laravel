<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $carts = Cart::where([['user_id', Auth::id()], ['status', 'Pending']])->get();
        return view('cart', compact('carts'));
    }

    // Add product item to cart
    public function store(Request $request){
        $product = Product::findorfail($request->id);
        $price = $product->sale_price ? $product->sale_price : $product->regular_price;
        $carts = Cart::where('user_id', Auth::user()->id)->get();

        foreach($carts as $cart){
            if($cart->product_id == $product->id){
                $cart->update([
                    'quantity_ordered' => ($cart->quantity_ordered + $request->quantity_ordered),
                    'total_price'      => ($cart->total_price + ($price * $request->quantity_ordered)),
                ]);

                $product->update([
                    'quantity' => ($product->quantity - $request->quantity_ordered),
                ]);
                return redirect()->back()->with('success', 'Updated done successfully !');
            } 
        }
            if($product->stock_status == 'instock'){
                Cart::create([
                    'quantity_ordered' => $request->quantity_ordered,
                    'total_price' => $price * $request->quantity_ordered,
                    'user_id' => Auth::user()->id,
                    'product_id' => $product->id,
                ]);
                $product->update([
                    'quantity' => ($product->quantity - $request->quantity_ordered),
                ]);
                return redirect()->back()->with('success', 'Added new product to your Cart !');
            }else{
                return redirect()->back()->with('error', 'Please try again later, The product is off stock right now !');
            }
    }

    // update quantity and total price for one item  
    public function update(Request $request){
        $cart = Cart::find($request->id);
        $product = Product::where('id', $cart->product_id)->get();
        $price = $product[0]->sale_price ? $product[0]->sale_price : $product[0]->regular_price;
       
        if($request->quantity_ordered > $cart->quantity_ordered){
            $cart->product->update([
                'quantity' => ($cart->product->quantity - ($request->quantity_ordered -  $cart->quantity_ordered)),
            ]);
        }else{
            $cart->product->update([
                'quantity' => ($cart->product->quantity + ($cart->quantity_ordered - $request->quantity_ordered)),
            ]);
        }

        if($request->quantity_ordered <= 0){
            $cart->delete();
            return redirect()->back();
        }else{
            $cart->update([
                'quantity_ordered' => $request->quantity_ordered,
                'total_price'      => $price * $request->quantity_ordered,
            ]);
            return redirect()->back()->with('success', 'Updated done successfully !');
        }
    }


    // delete item from your Cart
    public function destroy($id)
    {
        $cart = Cart::findorFail($id);
        $cart->product->update([
            'quantity' => ($cart->product->quantity + $cart->quantity_ordered),
        ]);
        $cart->delete();
        return redirect()->route('cart.index')->with('success', 'Delete product from your cart is Done !');
    }

    // Clear All items from your Cart
    public function clear(){
        Cart::truncate();
        return redirect()->route('cart.index')->with('success', 'Clear All products from your cart is Done !');
    }
}
