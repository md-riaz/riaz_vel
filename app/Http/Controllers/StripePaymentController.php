<?php

namespace App\Http\Controllers;


use App\Best_seller;
use App\Cart;
use App\Order;
use App\Order_list;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;
use App\Http\Controllers\Controller;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('site.stripe');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function stripePost()
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => request()->total * 100,
            "currency" => "bdt",
            "source" => request()->stripeToken,
            "description" => "Test payment from riaz_vel."
        ]);

        Session::flash('success', 'Payment successful!');

        // if online payment done, insert into orders table
        $order_id = Order::create(request()->all() + [
                'user_id' => Auth::id()
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

        return redirect('/');
    }
}
