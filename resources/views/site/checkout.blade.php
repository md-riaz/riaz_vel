@extends('layouts.site_master')
@section('site_title')
Checkout
@endsection
@section('content')
<x-breadcump title="Checkout" info="checkout" />
<!-- checkout-area start -->
<div class="checkout-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="checkout-form form-style">
                    <h3>Billing Details</h3>
                    <form action="/checkout/post" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <p>Full Name *</p>
                                <input type="text" required value="{{Auth::user()->name}}" name="full_name">
                            </div>
                            <div class="col-12">
                                <p>Company Name</p>
                                <input type="text" value="" name="company">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Email Address *</p>
                                <input type="email" required value="{{Auth::user()->email}}" name="email">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Phone No. *</p>
                                <input type="text" required value="" name="phone">
                            </div>
                            <div class="col-12">
                                <p>Country *</p>
                                <input type="text" required value="" name="country">
                            </div>
                            <div class="col-12">
                                <p>Your Address *</p>
                                <input type="text" required value="" name="address">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Postcode/ZIP</p>
                                <input type="text" required value="" name="post_code">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Town/City *</p>
                                <input type="text" required value="" name="city">
                            </div>

                            <div class="col-12">
                                <p>Order Notes </p>
                                <textarea name="notes"
                                    placeholder="Notes about Your Order, e.g.Special Note for Delivery"></textarea>
                            </div>
                        </div>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="order-area">
                    <h3>Your Order</h3>
                    <ul class="total-cost">
                        @php
                        $sub_total= 0;
                        @endphp
                        @forelse($cart as $item)
                        <li>{{$item->product->product_name}} <span class="pull-right">BDT.
                                {{$item->product->product_price}}</span></li>

                        @php
                        $sub_total+= $item->product->product_price*$item->quantity
                        @endphp
                        @empty
                        @endforelse

                        <li>Subtotal <span class="pull-right"><strong>BDT. {{$sub_total}}</strong></span></li>
                        <input type="hidden" name="sub_total" value="{{$sub_total}}">
                        <li>Shipping <span class="pull-right">Free</span></li>

                        <li>Total<span class="pull-right">BDT. {{$total}}</span></li>
                        <input type="hidden" name="total" value="{{$total}}">

                    </ul>
                    <ul class="payment-method">
                        <li>
                            <input id="delivery" type="radio" name="payment_method" value="1" checked />
                            <label for="delivery">Cash on Delivery</label>
                        </li>
                        <li>
                            <input id="card" type="radio" name="payment_method" value="2" />
                            <label for="card">Credit Card</label>
                        </li>
                    </ul>
                    <button type="submit">Place Order</button></form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- checkout-area end -->
@endsection
