<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    //
    public function delete(Location $location)
    {
        if(!(isset(auth()->user()->isAdmin)))
        {  
            return back()->with('failure','You dont have this permission');
        }
        $location->delete();
        return redirect('/locations')->with('success','Location is deleted');
    }

    public function storeLocation(Request $request)
    {       
        if(!(isset(auth()->user()->isAdmin)))
        {  
            return back()->with('failure','You dont have this permission');
        }
        $incomingFields = $request->validate([
            'name' => 'required'
        ]);
        $incomingFields['name'] = strip_tags($incomingFields['name']);

        Location::create($incomingFields);

        return back()->with('success','You created product !');


    }

    public function viewPage()
    {
        if(!(isset(auth()->user()->isAdmin)))
        {  
            return back()->with('failure','You dont have this permission');
        }
        $locations= Location::all();
        return view('locations', ['locations' => $locations]);
    }
}
