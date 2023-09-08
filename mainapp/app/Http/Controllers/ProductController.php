<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function storeProduct(Request $request)
    {
        $incomingFields = $request->validate(
            [
                'title' => 'required',
                'body' => 'required',
                'price' => 'required',
               //'status' => 'required', // add status field where 0 is new and 1 is used
                'phonenumber' => 'required',
                'location' => 'required'
            ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['price'] = strip_tags($incomingFields['price']);
        $incomingFields['phonenumber'] = strip_tags($incomingFields['phonenumber']);
        $incomingFields['location'] = strip_tags($incomingFields['location']);
        $incomingFields['user_id'] = auth()->id();
        // test 
        $incomingFields['category_id'] = 1; // change to selecteble categories

        Product::create($incomingFields);

        return 'Hey';
    }

    public function showCreateForm()
    {
        return view('create-product');
    }
}
