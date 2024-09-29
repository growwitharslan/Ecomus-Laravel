<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\orders;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function success()
    {
        $cart = session()->get('cart', []);
        $order = new orders();
        $order->user_id = Auth::user()->id; // Assuming you have user authentication
        $order->total_amount = array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $cart));
        $order->status = 'pending'; // Added status
        $order->save();
        session()->forget('cart'); // Delete the cart after saving the order
        $products = product::all();
        $cats = category::all();
        session()->flash('success', 'Order successful!');
        return view('dashboard', compact('products', 'cats'));
    }    public function cancel()
    {
        return redirect()->route('home')->with('error', 'Order cancelled!');
    }
}
