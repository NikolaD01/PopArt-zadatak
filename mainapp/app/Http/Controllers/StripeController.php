<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    //
    public function index()
    {}

    public function checkout()
    {
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
                            'unit_amount' => 500, //$5.00
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
        return view('/');
    }
}
