<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function search(Request $request)
    {
        $term = $request->input('term');
  

        $products= Product::where('title', 'like', "%$term%")
            ->orWhere('body', 'like', "%$term%")
            ->orWhere('price', 'like', "%$term%")
            ->orWhereHas('location', function ($query) use ($term) {
                $query->where('name', 'like', "%$term%");
            })
            ->orWhereHas('category', function ($query) use ($term) {
                $query->where('categoryName', 'like', "%$term%");
            })
            ->paginate(5); // 5 products per page
            return view('homepage-feed', compact('products'));
    }

    public function update(Product $product, Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
            
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['location_id'] = $locationId;
        $incomingFields['category_id'] = $categoryId;
    
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
                'status' => 'required',
                'phonenumber' => 'required'
            ]);
        
        $categoryId = $request->get('categoryId');
        $locationId = $request->get('locationId');
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['phonenumber'] = strip_tags($incomingFields['phonenumber']);
        $incomingFields['user_id'] = auth()->id();
        // test 
        $incomingFields['location_id'] = $locationId;
        $incomingFields['category_id'] = $categoryId; 

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
        $locations = Location::all();
        $categories= Category::all();
        return view('create-product', ['categories' => $categories, 'locations' => $locations]);
    }
}
