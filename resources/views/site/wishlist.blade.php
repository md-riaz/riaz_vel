@extends('layouts.site_master')
@section('site_title')
    Wish list
@endsection

@section('content')
    <x-breadcump title="Wishlist" info="wishlist"/>
    <!-- cart-area start -->
    <div class="cart-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if(session('status'))
                        <div class="alert alert-success"> {{session('status')}}</div>
                    @endif
                    <form action="{{url('add/to/cart')}}" method="post">
                        @csrf
                        <table class="table-responsive cart-wrap">
                            <thead>
                            <tr>
                                <th class="images">Image</th>
                                <th class="product">Product</th>
                                <th class="ptice">Price</th>
                                <th class="stock">Stock Status</th>
                                <th class="addcart">Add to Cart</th>
                                <th class="remove">Remove</th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse($wishlists as $item)
                                <tr>
                                    <td class="images"><img
                                            src="{{asset('uploads/product_photos/'.$item->product->product_thumbnail_photo)}}"
                                            alt="">
                                    </td>
                                    <td class="product"><a
                                            href="{{url('product/'.$item->product->id)}}">{{$item->product->product_name}}</a>
                                    </td>
                                    <td class="ptice">BDT. {{$item->product->product_price}}</td>
                                    <td class="stock ">
                                        No idea
                                    </td>
                                    <td class="addcart">
                                        <form action="{{url('/add/to/cart')}}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{$item->product->id}}" name="product_id"/>
                                            <input type="hidden" value="1" name="quantity"/>
                                            <button type="submit" class="btn-cart">Add to Cart</button>
                                            <style>
                                                .btn-cart {
                                                    height: 35px;
                                                    line-height: 35px;
                                                    text-align: center;
                                                    width: 120px;
                                                    background: #ef4836;
                                                    color: #fff !important;
                                                    display: block;
                                                    margin-left: 30px;
                                                    cursor: pointer;
                                                    border: none;
                                                }
                                            </style>
                                        </form>
                                    </td>

                                    <td class="remove"><a href="{{url('remove/wishlist/'.$item->id)}}"><i
                                                class="fa fa-times"></i></a></td>
                                </tr>
                            @empty
                                <td colspan="10">No Products</td>
                            @endforelse
                            </tbody>
                        </table>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-area end -->
@endsection
