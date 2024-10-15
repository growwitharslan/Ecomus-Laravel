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
        $user = orders::findOrFail($request->id);
        $user->delete();
        return response()->json(['msg' => 'success', 'response' => 'Order deleted successfully.']);
    }
    public function orderDetails($id)
    {
        $order = orders::findOrFail($id);
        $orderitems = OrderItems::where('order_id', $id)->get();
        return view('order-details', compact('order', 'orderitems'));
    }
}
