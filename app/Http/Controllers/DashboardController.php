<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
{
    $products = product::all();
    $cats = category::all();

    // Get cart from session (default to empty array if not set)
    $cart = session()->get('cart', []);

    // Sum all quantities in cart
    $cartCount = collect($cart)->sum('quantity');

    // Count only orders belonging to the logged-in user
    $orderCount = \App\Models\orders::where('user_id', auth()->id())->count();

    return view('dashboard', compact('products', 'cats', 'orderCount', 'cartCount'));
}

}
