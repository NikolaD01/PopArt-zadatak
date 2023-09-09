<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function update(Product $product, Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
            
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['location_id'] = 1; // change to one of selectebles locations
        $incomingFields['category_id'] = 1; // change to selecteble categories

    
        $product->update($incomingFields);

        return back()->with('success', 'Post sucessfuly updated');
    }

    public function showEditForm(Product $product)
    {
        return view('edit-product', ['product' => $product]);
    }

    public function delete(Product $product)
    {
         // if(auth()->user()->cannot('delete', $product))
        //  return 'You dont have premmision do delete this product';
        // }
        $product->delete();
        return redirect('/profile/' . auth()->user()->username)->with('success','Product is deleted');
    }

    public function viewSingleProduct(Product $product)
    {
        // $product is product id
        // laravel we query for us if we match parameter names in route and function

        return view('single-product',['product' => $product]);
    }

    public function storeProduct(Request $request)
    {
        $incomingFields = $request->validate(
            [
                'title' => 'required',
                'body' => 'required',
                'price' => 'required',
               //'status' => 'required', // add status field where 0 is new and 1 is used
                'phonenumber' => 'required',
                'location_id' => 'required'
            ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['phonenumber'] = strip_tags($incomingFields['phonenumber']);
        $incomingFields['user_id'] = auth()->id();
        // test 
        $incomingFields['location_id'] = 1; // change to one of selectebles locations
        $incomingFields['category_id'] = 1; // change to selecteble categories

        Product::create($incomingFields);

        return redirect('/')->with('success','You created product !');

    }

    public function showCreateForm()
    {
        // checks if user is logged in, if not send it back.
        // if(!auth()->check())
        // {
        //   return view('/');
        // } 
        return view('create-product');
    }
}
