<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function oderGenerate(Request $request)
    {
        $order = Order::create([
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'sub_total' => $request->sub_total,
            'grand_total' => $request->grand_total,
        ]);

        $orderID = $order->id;

        // Check if product_id exists in the request and is an array
        if ($request->has('product_id') && is_array($request->product_id)) {
            foreach ($request->product_id as $key => $value) {
                // Use $value instead of $request->rowId
                $orderItem = OrderItem::create([
                    'order_id' => $orderID,
                    'product_id' => $value,
                    'product_qty' => $request->product_qty[$key],
                    'product_price' => $request->product_price[$key],
                ]);
            }
        }

        flashy()->info('Order will be Generated Successfully. ✅', '#');
        return redirect()->route('cart');
    }

}