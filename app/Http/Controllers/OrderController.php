<?php

namespace App\Http\Controllers;

use App\Models\orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {   
        $orders = orders::all();
        return view('orders', compact('orders'));
    }
    public function cancel(Request $request)
    {
        $user = orders::findOrFail($request->id);
        //delete product from database
        $user->delete();
        return response()->json(['msg' => 'success', 'response' => 'Order deleted successfully.']);
    }
}

