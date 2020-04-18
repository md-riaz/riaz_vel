<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        return view('admin.coupon.index', [
            'coupons' => Coupon::all()
        ]);
    }

    public function store()
    {
        $data = request()->validate([
            'coupon_name' => 'required | unique:coupons,coupon_name',
            'discount_amount' => 'required | numeric | min:1 | max:99',
            'validity_till' => 'required'
        ]);
        $coupon = new Coupon();
        $coupon->coupon_name = strtoupper(request()->coupon_name);
        $coupon->discount_amount = request()->discount_amount;
        $coupon->validity_till = request()->validity_till;
        $coupon->save();

        return back()->with('success_message', 'Coupon added successfully');
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return back()->with('delete_status', 'Coupon Deleted');
    }
}
