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
        }
        else {
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
        // return $cartContent;
        //dd($cartContent);
        //  $data['cartContent'] =$cartContent;
        return view('cart', compact('cartContent'));
    }

    public function updateCart(Request $request)
    {
        $rowId = $request->rowId;
        $qty = $request->qty;

        // Check quantity available in Stock
        $itemInfo = Cart::get($rowId);
        $product = Product::find($itemInfo->id);

        if ($product && $qty < $product->qty) {
            // If product is found and requested quantity is less than or equal to available quantity
            Cart::update($rowId, $qty);
            $message = 'Cart updated successfully';
            $status = true;
        }
        else {
            // If product not found or requested quantity exceeds available quantity
            $message = 'Requested quantity (' . $qty . ') not available in stock. Cart not updated.';
            $status = false;
        }

        session()->flash('success', $message);

        return response()->json([
            'status' => $status,
            'message' => $message,
        ]);
    }

    public function deleteItem(Request $request)
    {
        $itemInfo = Cart::get($request->rowId);
        if ($itemInfo == null) {
            $errorMessage = ' Item not found in cart';
            session()->flash('error', $errorMessage);
            return response()->json([
                'status' => false,
                'message' => $errorMessage,
            ]);

        }
        Cart::remove($request->rowId);
        $message = 'Item deleted successfully from cart';
        session()->flash('success', $message);
        return response()->json([
            'status' => true,
            'message' => $message,
        ]);


    }
    // checkout

    public function checkout()
    {
        $cartContent = Cart::content();
        return view('checkout', compact('cartContent'));
    }




}
