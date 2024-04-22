<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Cart;
use App\Models\Location;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        $wishlists = Wishlist::where('user_id', Auth::user()->id)->get();
        $locations = Location::where('user_id', Auth::user()->id)->get();
        return view('users.index', compact('carts','wishlists','locations'));
    }

    public function edit($id){
        $user = User::find($id);
        return view('users.edituser', compact('user'));
    }

    public function update($id, Request $request){
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone
        ]);
        return redirect()->back()->with('success', 'Your Information Updated Successfully !');
    }

    public function delete($id){
       User::findorFail($id)->delete();
        return redirect()->route('login');
    }

    public function changepassword($id){
        $user = User::find($id);
        return view('users.changepassword', compact('user'));
    }

    public function donechangepassword($id, Request $request){
        $user = User::find($id);

        $this->validate($request, [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $current_password = Hash::make($request->current_password);
            $user->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect()->back()->with('success', 'Your Password Updated Successfully !');
    }
}
