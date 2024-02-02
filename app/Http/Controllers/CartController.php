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
        if (Cart::count() > 0) {
            // product found in card
            // check if this  product already in cart
            // return message product already in your cart
            // if product not found in card then add product in cart

            $cartContent = Cart::content();
            $productAlreadyExist = false;
            foreach ($cartContent as $item) {

                if ($item->id == $product->id) {
                    $productAlreadyExist = true;
                }
                // ager product cart mai nhi mila
                if ($productAlreadyExist == false) {
                    Cart::add($product->id, $product->name, 1, $product->price, [$product->image]);
                    $status = true;
                    $message = $product->name . 'Added in cart';



                }
                else {
                    $status = false;
                    $message = $product->name . ' Already Added  in cart';


                }
            }



        } else {
            echo "cart is empty now adding a product in cart";

            Cart::add($product->id, $product->name, 1, $product->price, [$product->image]);
            $status = true;
            $message = $product->name . ' Added in card';
        }
        return response()->json([
            'status' => $status,
            'message' => $message
        ]);


    }
    public function cart()
    {
        $cartContent = Cart::content();
        // dd($cartContent);
        $data['cartContent'] =$cartContent;
        return view('cart', $data);
    }

}

