<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request)
    {
        // Retrieve input values
        $product_id = $request->input('id');
        $product_name = $request->input('name');
        $product_price = $request->input('price');
        $product_image = $request->input('image');
        $quantity = $request->input('quantity');

        // Retrieve cart from session, or create an empty cart if it doesn't exist
        $cart = session()->get('cart', []);

        // If the product is already in the cart, update its quantity
        if (isset($cart[$product_id])) {
            $cart[$product_id]['quantity'] += $quantity;
        } else {
            // Otherwise, add the product to the cart
            $cart[$product_id] = [
                'id' => $product_id,
                'name' => $product_name,
                'price' => $product_price,
                'image' => $product_image,
                'quantity' => $quantity
            ];
        }

        // Store the updated cart in the session
        session()->put('cart', $cart);
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function remove(Request $request)
    {
        // Retrieve input values
        $product_id = $request->input('id');
        // Retrieve cart from session, or create an empty cart if it doesn't exist
        $cart = session()->get('cart', []);
        // Remove the product from the cart
        unset($cart[$product_id]);
        // Store the updated cart in the session
        session()->put('cart', $cart);
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Product removed from cart successfully');
    }
}
