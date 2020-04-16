<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function CartAdd()
    {
        $product_id = request()->product_id;
        $ip_add = request()->ip();
        $selected_column = Cart::where('product_id', $product_id)->where('ip_address', $ip_add);

        if ($selected_column->exists()) {
            $selected_column->increment('quantity', request()->quantity);
        } else {
            // Insert id, quantity and ip address to database
            Cart::create([
                'product_id' => $product_id,
                'quantity' => request()->quantity,
                'ip_address' => $ip_add,
            ]);
        }
        return back();
    }

    public function show()
    {
        return view('site.cart', [
            'cart' => Cart::where('ip_address', \request()->ip())->get()
        ]);
    }
}
