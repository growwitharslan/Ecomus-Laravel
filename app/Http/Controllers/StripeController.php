<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function session()
{
    \Stripe\Stripe::setApiKey(config('stripe.sk'));

    // Retrieve cart from session
    $cart = session()->get('cart', []);

    // Prepare the line_items array for Stripe
    $lineItems = [];
    foreach ($cart as $item) {
        $lineItems[] = [
            'price_data' => [
                'currency' => 'usd', // Change currency if needed
                'product_data' => [
                    'name' => $item['name'], // Product name from cart session
                ],
                'unit_amount' => $item['price'] * 100, // Stripe expects the amount in cents
            ],
            'quantity' => $item['quantity'], // Quantity from cart session
        ];
    }

    // Create the Stripe checkout session
    $session = \Stripe\Checkout\Session::create([
        'line_items' => $lineItems,
        'mode' => 'payment',
        'success_url' => route('stripe.success'),
        'cancel_url' => route('stripe.cancel'),
    ]);

    return redirect()->away($session->url);
}
public function success(){
    return view('dashboard')->with('success', 'Order successful!');
}
public function cancel(){
    return redirect()->route('home')->with('error', 'Order cancelled!');
}
}