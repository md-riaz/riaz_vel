@extends('layouts.site_master')
@section('site_title')
    Shopping Cart
@endsection

@section('content')
    <x-breadcump title="Shopping Cart" info="cart"/>
    <!-- cart-area start -->
    <div class="cart-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if(session('status'))
                        <div class="alert alert-success"> {{session('status')}}</div>
                    @endif
                    <form action="{{url('cart/post')}}" method="post">
                        @csrf
                        <table class="table-responsive cart-wrap">
                            <thead>
                            <tr>
                                <th class="images">Image</th>
                                <th class="product">Product</th>
                                <th class="ptice">Price</th>
                                <th class="quantity">Quantity</th>
                                <th class="total">Total</th>
                                <th class="remove">Remove</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php
                                $sub_total = 0
                            @endphp

                            @forelse($cart as $item)
                                <tr>
                                    <td class="images"><img
                                            src="{{asset('uploads/product_photos/'.$item->product->product_thumbnail_photo)}}"
                                            alt="">
                                    </td>
                                    <td class="product"><a
                                            href="{{url('product/'.$item->product->id)}}">{{$item->product->product_name}}</a>
                                    </td>
                                    <td class="ptice">BDT. {{$item->product->product_price}}</td>
                                    <td class="quantity cart-plus-minus">
                                        <input type="text" value="{{$item->quantity}}"
                                               name="quantity[{{$item->product->id}}]"/>
                                    </td>
                                    <td class="total">BDT. {{$item->product->product_price*$item->quantity}}</td>
                                    @php
                                        $sub_total+= $item->product->product_price*$item->quantity
                                    @endphp
                                    <td class="remove"><a href="{{url('remove/cart/'.$item->id)}}"><i
                                                class="fa fa-times"></i></a></td>
                                </tr>
                            @empty
                                <td colspan="10">No Products</td>
                            @endforelse

                            </tbody>
                        </table>
                        <div class="row mt-60">
                            <div class="col-xl-4 col-lg-5 col-md-6 ">
                                <div class="cartcupon-wrap">
                                    <ul class="d-flex">
                                        <li>
                                            <button type="submit">Update Cart</button>
                                        </li>
                                        <li><a href="{{url('shop')}}">Continue Shopping</a></li>
                                    </ul>
                                    <h3>Cupon</h3>
                                    <p>Enter Your Cupon Code if You Have One</p>
                                    <div class="cupon-wrap">
                                        <input type="text" placeholder="Cupon Code" id="couponinput"
                                               value="{{$coupon_name ?? ""}}">
                                        <a id="applyCoupon"
                                           style="width: 150px;
                                                  height: 45px;
                                                  position: absolute;
                                                  right: 0;
                                                  top: 0;
                                                  background: #ef4836;
                                                  color: #fff;
                                                  text-transform: uppercase;
                                                  border: none;text-align: center;line-height: 3.3;cursor: pointer"
                                        >Apply Cupon</a>
                                    </div>
                                </div>
                                @if(session('invalid'))
                                    <div class="alert alert-danger">{{session('invalid')}}</div>
                                @endif
                            </div>
                            <div class="col-xl-3 offset-xl-5 col-lg-4 offset-lg-3 col-md-6">
                                <div class="cart-total text-right">
                                    <h3>Cart Totals</h3>
                                    <ul>
                                        <li><span class="pull-left">Subtotal </span>BDT. {{$sub_total}}</li>
                                        @isset($discount)
                                            <li><span
                                                    class="pull-left">Discount({{$discount}}%) </span> - BDT.
                                                {{$sub_total*($discount/100)}}
                                            </li>
                                            <li><span class="pull-left"> Total </span>
                                                BDT. {{$sub_total - $sub_total*($discount/100)}}</li>
                                        @else
                                            <li><span class="pull-left"> Total </span> BDT. {{$sub_total}}</li>
                                        @endisset

                                    </ul>
                                    <a href="{{url('checkout')}}">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-area end -->
@endsection
