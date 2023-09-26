<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function viewPage()
    {

    }

    public function add($productId)
    {

        // Step 1: Check if the user is authenticated
    if (auth()->check())
    {
        // Step 2: Retrieve the user ID
        $userId = auth()->user()->id;

        // Check if the product is already in the user's wishlist
        $existingWishlistItem = Wishlist::where('user_id', $userId)
                                        ->where('product_id', $productId)
                                        ->first();

        if (!$existingWishlistItem)
        {
            // If the item doesn't exist, create a new wishlist record
            $whistlistItem = new Wishlist();
            $whistlistItem->user_id = $userId;
            $whistlistItem->product_id = $productId;

            if ($whistlistItem->save()) {
                return redirect()->back()->with('success', 'Product added to wishlist.');
            } else {
                return redirect()->back()->with('failure', 'Failed to add product to wishlist.');
            }
            } else 
            {
                // If the item already exists in the wishlist, display a message
                return redirect()->back()->with('failure', 'Product is already added to wishlist.');
            }
        } else {
            // Handle the case where the user is not authenticated
            // You can redirect them to the login page or display an error message
            return redirect()->route('login')->with('failure', 'Please log in to add products to wishlist.');
        }
    }

    public function remove()
    {

    }
}
