<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function CartAdd()
    {
        $product_id = request()->product_id;
        $ip_add = request()->ip();
        $selected_column = Cart::where('product_id', $product_id)->where('ip_address', $ip_add);
        if (Product::where('id', $product_id)->first()->product_quantity < request()->quantity) {
            return back()->with('status_error', 'You cannot add more than available quantity');
        } else {
            if ($selected_column->exists()) {
                $selected_column->increment('quantity', request()->quantity);
            } else {
                // Insert id, quantity and ip address to database
                Cart::create([
                    'product_id' => $product_id,
                    'quantity' => request()->quantity,
                    'ip_address' => $ip_add,
                ]);
                return back()->with('cart_added', 'Added to cart');
            }
        }

    }

    public function show()
    {
        return view('site.cart', [
            'cart' => Cart::where('ip_address', \request()->ip())->get()
        ]);
    }

    public function update()
    {
        // Loop through every product as product id and quantity value
        foreach (\request()->quantity as $product_id => $quantity) {
            // Select all from cart where ip address is req ip and product id is req product id and update quantity
            Cart::where('ip_address', \request()->ip())->where('product_id', $product_id)->update([
                'quantity' => $quantity
            ]);
        }
        return back()->with('status', 'Cart updated');
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return back()->with('status', 'Item removed');
    }
}
