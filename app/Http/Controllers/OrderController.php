<?php

namespace App\Http\Controllers;

use App\Models\OrderItems;
use App\Models\orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = orders::where('user_id', auth()->id())->get();
        $orderitems = OrderItems::all();
        return view('orders', compact('orders', 'orderitems'));
    }
    public function cancel(Request $request)
{
    $order = orders::with('items')->findOrFail($request->id);

    // Delete all related order items first
    $order->items()->delete();

    // Now delete the order
    $order->delete();

    return response()->json([
        'msg' => 'success',
        'response' => 'Order and related items deleted successfully.'
    ]);
}

    public function orderDetails($id)
    {
        $order = orders::findOrFail($id);

        // Load order items with their related product
        $orderitems = \App\Models\OrderItems::with('product')
            ->where('order_id', $id)
            ->get();

        return view('order-details', compact('order', 'orderitems'));
    }
    
}
