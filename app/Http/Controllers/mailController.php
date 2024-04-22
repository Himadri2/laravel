<?php

namespace App\Http\Controllers;

use App\Models\Mail;
use Illuminate\Http\Request;

class mailController extends Controller
{

    public function store(Request $request){
        Mail::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone,
            'comment' => $request->comment
        ]);
        return redirect()->back()->with('success', 'Your Mail Send Successfully!');
    }
}
