<?php

namespace App\Http\Controllers;

use App\Best_seller;
use App\Cart;
use App\Order;
use App\Product;
use App\Order_list;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * CheckoutController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->role == 1) {
            echo "Admins cannot buy products";
        } else {
            return view('site.checkout', [
                'cart' => Cart::where('ip_address', \request()->ip())->get(),
                'total' => request()->total
            ]);
        }
    }

    public function orders()
    {
        if (request()->payment_method == 1) {
            // if payment method is 1, insert into orders table
            $order_id = Order::create([
                'user_id' => Auth::id(),
                'full_name' => request()->full_name,
                'email' => request()->email,
                'phone' => request()->phone,
                'country' => request()->country,
                'address' => request()->address,
                'post_code' => request()->post_code,
                'city' => request()->city,
                'notes' => request()->notes,
                'payment_method' => request()->payment_method,
                'sub_total' => request()->sub_total,
                'total' => request()->total,
            ]);
            // Get all the products from cart table and loop through each item
            foreach (Cart::where('ip_address', \request()->ip())->get() as $cart) {

/***************  If product id is exist on Best_seller table then increase ordered by given quantity  **************/

                $selected_column = Best_seller::where('product_id', $cart->product_id);
                if ($selected_column->exists()) {
                    $selected_column->increment('ordered', $cart->quantity);
                } else {
                    // Else create a new item on this table
                    Best_seller::create([
                        'product_id' => $cart->product_id,
                        'ordered' => $cart->quantity,
                    ]);
                }
/*********************************     X     ***************************************/


                // Insert into order list table for order details of each product
                Order_list::create([
                    'order_id' => $order_id->id,
                    'user_id' => Auth::id(),
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity
                ]);
                // decrement quantity from product table
                Product::findOrFail($cart->product_id)->decrement('product_quantity', $cart->quantity);

                // Delete item from cart table when order done
                Cart::find($cart->id)->delete();

            }


            return redirect('/')->with('success', 'Order added to list');

        } else {
            return view('site.stripe', [
                'req_all_data' => request()->all()
            ]);

        }
    }
}
