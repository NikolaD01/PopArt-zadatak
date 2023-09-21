<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function viewPage()
    {

        $userId = auth()->user()->id;

        $cartItems = Cart::where('user_id', $userId)->with('product')->get();
        $cart = Cart::where('user_id', $userId)->pluck('product_id');
        $cartProducts = Product::whereIn('id', $cart)->paginate(5); // 5 products per page        
            //return view('homepage-feed', compact('products'));
        return  view('cart', ['cartProducts' => $cartProducts,'cart' => $cartItems]);


    }

    public function addProduct($productId)
    {

        // Step 1: Check if the user is authenticated
        if (Auth::check()) {
            // Step 2: Retrieve the user ID
            $userId = Auth::id();

            // Create a new cart record for the authenticated user
            $cartItem = new Cart();
            $cartItem->user_id = $userId;
            $cartItem->product_id = $productId;
            $cartItem->save();

            return redirect()->back()->with('success', 'Product added to cart.');
        } else {
            // Handle the case where the user is not authenticated
            return redirect()->route('login')->with('error', 'Please log in to add products to your cart.');
        }
    }

    public function deleteProduct($product)
    {
        $userId = auth()->id();

        // Find and delete the cart item with the given product ID
        $cartItem = Cart::where('user_id', $userId)->where('product_id', $product)->first();

        if ($cartItem) {
            $cartItem->delete();
            return redirect()->back()->with('success', 'Product removed from cart.');
        } else {
            return redirect()->back()->with('error', 'Product not found in cart.');
        }
    }
}
