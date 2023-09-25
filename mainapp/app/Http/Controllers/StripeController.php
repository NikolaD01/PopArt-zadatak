<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    //
    public function checkout(Request $request)
    {
        // Get the total price from the request
        $totalPrice = $request->input('total_price');

        Stripe::setApiKey(env('STRIPE_SK'));
        $session = \Stripe\Checkout\Session::create(
            [
                'line_items' => 
                [
                    [
                        'price_data' =>
                        [
                            'currency' => 'gbp',
                            'product_data' => ['name' => 'send me money'],
                            'unit_amount' => $totalPrice * 100, // Convert to cents
                        ],
                        'quantity' =>1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('cart'),
                'cancel_url'  => route('cart'),
            ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        return view('/')->with('success', 'Product paid successfully!');
    }
}
