<?php

namespace App\Http\Controllers;

use App\Cart;
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
                'cart' => Cart::where('ip_address', \request()->ip())->get()
            ]);
        }

    }
}
