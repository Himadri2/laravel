<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    public function create(){
        return view('users.createlocation');
    }

    public function store(Request $request){
        Location::create([
            'user_id' => Auth::user()->id,
            'building' => $request->building,
            'street' => $request->street,
            'area' => $request->area,
            'position' => $request->locality,
        ]);
        return redirect()->back()->with('success', 'Your Location Created Successfully !');

    }

    public function edit($id){
        $location = Location::findorFail($id);
        return view('users.editlocation', compact('location'));
    }

    public function update(Request $request, $id){
        $location = Location::findorFail($id);
        $location->update([
            'building' => $request->building,
            'street' => $request->street,
            'area' => $request->area,
            'position' => $request->locality,
        ]);
        return redirect()->back()->with('success', 'Your Location Updated Successfully !');
    }

    public function destroy($id){
        Location::findorFail($id)->delete();
        return redirect()->back()->with('success', 'Your Location Deleted Successfully !');
    }
}
