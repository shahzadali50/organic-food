<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OderController extends Controller
{
    public function store(Request $request)
    {
        $order = Order::create([
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'sub_total' => $request->sub_total,
            'disc' => $request->disc,
            'grand_total' => $request->grand_total,
            'paid' => $request->paid,
        ]);
        $orderID = $order->id;
        foreach ($request->product_id as $key => $value) {
            $order = OrderItem::create([
                'order_id' => $orderID,
                'product_id' => $request->product_id[$key],
                'product_qty' => $request->product_qty[$key],
                'product_price' => $request->product_price[$key],
            ]);

        }
        flashy()->info('Order will be Generate Successfully. ✅', '#');
        return redirect()->route('order.create');
    }
}
