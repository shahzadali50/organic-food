<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;

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
        foreach ($request->product_id as $key => $value) {
            // Use $value instead of $request->rowId
            $orderItem = OrderItem::create([
                'order_id' => $orderID,
                'product_id' => $request->product_id[$key],
                'product_qty' => $request->product_qty[$key],
                'product_price' => $request->product_price[$key],
            ]);
             // Decrease the quantity of the product
        $product = Product::find($request->product_id[$key]);
        $product->qty -= $request->product_qty[$key];
        $product->save();
        }

        flashy()->info('Order will be Generated Successfully. ✅', '#');

        Cart::destroy();
        return view('order-message');
        // return redirect()->route('order.message');
    }

}
