@extends('layouts.site_master')
@section('site_title')
    Shop
@endsection
@section('content')
    <x-breadcump title="Shop Page" info="Shop"/>
    <!-- product-area start -->
    <div class="product-area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="product-menu">
                        <ul class="nav justify-content-center">
                            <li>
                                <a class="active" data-toggle="tab" href="#all">All product</a>
                            </li>

                            @foreach($categories as $category)
                                <li>
                                    <a data-toggle="tab"
                                       href="#category_{{$category->id}}">{{$category->category_name}}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="all">
                    <ul class="row">
                        @forelse($products as $product)
                            <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                <div class="product-wrap">
                                    <div class="product-img">
                                        <span>Sale</span>
                                        <img
                                            src="{{asset('uploads/product_photos/'.$product->product_thumbnail_photo)}}"
                                            alt="">
                                        <div class="product-icon flex-style">
                                            <ul>
                                                <li><a data-toggle="modal" data-target="#exampleModalCenter"
                                                       href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                                <li><a href="{{url('add/to/wishlist/'.$product->id)}}"><i
                                                            class="fa fa-heart"></i></a></li>
                                                <li><a href="{{url('cart')}}"><i class="fa fa-shopping-bag"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="{{url('/product/'.$product->id)}}">{{$product->product_name}}</a>
                                        </h3>
                                        <p class="pull-left">${{$product->product_price}}

                                        </p>
                                        <ul class="pull-right d-flex">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-o"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <p class="m-auto">No Products</p>
                        @endforelse
                    </ul>
                </div>

                @foreach($categories as $category)

                    <div class="tab-pane" id="category_{{$category->id}}">
                        <ul class="row">
                            @forelse(App\Product::where('category_id', $category->id)->get() as $product)
                                <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <div class="product-wrap">
                                        <div class="product-img">
                                            <span>Sale</span>
                                            <img
                                                src="{{asset('uploads/product_photos/'.$product->product_thumbnail_photo)}}"
                                                alt="">
                                            <div class="product-icon flex-style">
                                                <ul>
                                                    <li><a data-toggle="modal" data-target="#exampleModalCenter"
                                                           href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                                    <li><a href="{{url('add/to/wishlist/'.$product->id)}}"><i
                                                                class="fa fa-heart"></i></a></li>
                                                    <li><a href="{{url('cart')}}"><i class="fa fa-shopping-bag"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h3>
                                                <a href="{{url('/product/'.$product->id)}}">{{$product->product_name}}</a>
                                            </h3>
                                            <p class="pull-left">${{$product->product_price}} </p>
                                            <ul class="pull-right d-flex">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-half-o"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            @empty
                                <p class="m-auto">No Products</p>
                            @endforelse
                        </ul>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
    <!-- product-area end -->
@endsection