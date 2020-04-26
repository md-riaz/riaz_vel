<?php

namespace App\Http\Controllers;


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
     * @return \Illuminate\Http\Response
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

        return back();
    }
}
