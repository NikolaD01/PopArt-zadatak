<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
            'title' => 'string|max:255',
            'body' => 'string',
            'price' => 'numeric|min:0', 
            'status' => 'in:New,Used',
            'phonenumber' => 'phone_number', // Use the custom rule 'phone_number'                
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:width=300,height=300'            
            
        ]);

        $categoryId = $request->get('categoryId');
        $locationId = $request->get('locationId');
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['phonenumber'] = strip_tags($incomingFields['phonenumber']);
        $incomingFields['location_id'] = $locationId;
        $incomingFields['category_id'] = $categoryId; 

        if ($request->hasFile('image'))
        {

            $newImage = $request->file('image')->store('images', 'public');

            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }

            $product->update(['image_path' => $newImage]);
        }


    
        $product->update($incomingFields);

        return back()->with('success', 'Post sucessfuly updated');
    }

    public function showEditForm(Product $product)
    {
        $locations = Location::all();
        $categories= Category::all();
        return view('edit-product', ['product' => $product,'categories' => $categories, 'locations' => $locations]);
    }

    public function delete(Product $product)
    {
        $product->delete();
        return redirect('/profile/' . auth()->user()->username)->with('success','Product is deleted');
    }

    public function viewSingleProduct(Product $product)
    {
    
        return view('single-product',['product' => $product]);
    }

    public function storeProduct(Request $request)
    {
        $incomingFields = $request->validate(
            [
                'title' => 'required|string|max:255',
                'body' => 'required|string',
                'price' => 'required|numeric|min:0', 
                'status' => 'required|in:New,Used',
                'phonenumber' => 'required|phone_number', // Use the custom rule 'phone_number'                
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:width=300,height=300'            
                ]);
        
        $categoryId = $request->get('categoryId');
        $locationId = $request->get('locationId');
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['phonenumber'] = strip_tags($incomingFields['phonenumber']);
        $incomingFields['user_id'] = auth()->id();
        $incomingFields['location_id'] = $locationId;
        $incomingFields['category_id'] = $categoryId; 

        $product = Product::create($incomingFields);
        
        $imagePath = $request->file('image')->store('images', 'public');


        $product->images()->create(['image_path' => $imagePath]);

       
        return redirect('/')->with('success', 'You created product!');
        
    }

    public function showCreateForm()
    {

        $locations = Location::all();
        $categories= Category::all();
        return view('create-product', ['categories' => $categories, 'locations' => $locations]);
    }
    public function storeComment(Request $request, Product $product)
    {
        $request->validate([
            'content' => 'required|string|max:255', 
        ]);

        $comment = new Comment([
            'content' => $request->input('content'),
        ]);

        $comment->product()->associate($product);
        $comment->user()->associate(auth()->user());

        $comment->save();

        return back()->with('success', 'Comment added successfully!');
    }

    
}
