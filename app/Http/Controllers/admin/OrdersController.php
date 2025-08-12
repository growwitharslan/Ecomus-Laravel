<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = orders::all();
        return view('admin.orders', compact('orders'));
    }


    public function getOrderItems(Request $request)
{
    $orderId = $request->id;

    $order = \App\Models\orders::with('items.product')->find($orderId);

    if (!$order) {
        return response()->json(['success' => false]);
    }

    $items = $order->items->map(function ($item) {
        return [
            'product_name' => $item->product_name,
            'quantity' => $item->quantity,
            'price' => $item->price,
            'product_image' => $item->product && $item->product->image
                ? asset('uploads/products/' . $item->product->image)
                : asset('admin_assets/img/no-image.png'),
        ];
    });

    return response()->json([
        'success' => true,
        'items' => $items,
    ]);
}

}
