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
        return view('dashboard', compact('products', 'cats'));
    }
}
