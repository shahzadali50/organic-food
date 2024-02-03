<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = Product::find($request->id);

        if ($product == null) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found'
            ]);
        }

        $status = false;
        $message = '';

        if (Cart::count() > 0) {
            $cartContent = Cart::content();
            $productAlreadyExist = false;

            foreach ($cartContent as $item) {
                if ($item->id == $product->id) {
                    $productAlreadyExist = true;
                    break; // exit the loop when the product is found
                }
            }

            if (!$productAlreadyExist) {
                Cart::add($product->id, $product->name, 1, $product->price, [$product->image]);
                $status = true;
                $message = $product->name . ' Added in cart';
            } else {
                $status = false;
                $message = $product->name . ' Already Added in cart';
            }
        } else {
            Cart::add($product->id, $product->name, 1, $product->price, [$product->image]);
            $status = true;
            $message = $product->name . ' Added in cart';
        }

        return response()->json([
            'status' => $status,
            'message' => $message
        ]);
    }

    public function cart()
    {
        $cartContent = Cart::content();
        //dd($cartContent);
      //  $data['cartContent'] =$cartContent;
        return view('cart', ['cartContent'=>$cartContent]);
    }

}

