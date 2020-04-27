@extends('layouts.site_master')

@section('content')
    <!-- slider-area start -->
    <div class="slider-area">
        <div class="swiper-container">
            <div class="swiper-wrapper">

                @forelse($banners as $banner)
                    <div class="swiper-slide overlay">
                        <div class="single-slider slide-inner"
                             style="background: url({{asset('uploads/banner_photos/'.$banner->banner_photo)}})">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 col-lg-9 col-12">
                                        <div class="slider-content">
                                            <div class="slider-shape">
                                                <h2 data-swiper-parallax="-500">{{$banner->banner_title}}</h2>
                                                <p data-swiper-parallax="-400">{{$banner->banner_info}}</p>
                                                <a href="#" data-swiper-parallax="-300">Shop Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!-- slider-area end -->
    <!-- featured-area start -->
    <div class="featured-area featured-area2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="featured-active2 owl-carousel next-prev-style">
                        @forelse($categories as $category)
                            <div class="featured-wrap">

                                <div class="featured-img">
                                    <img src="{{ asset('uploads/category_photos/'.$category->category_img) }}" alt="">
                                    <div class="featured-content">
                                        <a href="#">{{$category->category_name}}</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            No data to show
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- featured-area end -->
    <!-- start count-down-section -->
    <div class="count-down-area count-down-area-sub">
        <section class="count-down-section section-padding parallax" data-speed="7">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-12 text-center">
                        <h2 class="big">Deal Of the Day <span>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</span>
                        </h2>
                    </div>
                    <div class="col-12 col-lg-12 text-center">
                        <div class="count-down-clock text-center">
                            <div id="clock">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
    </div>
    <!-- end count-down-section -->
    <!-- product-area start -->
    <div class="product-area product-area-2">
        <div class="fluid-container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Best Seller</h2>
                        <img src="{{ asset('frontend_assets') }}/images/section-title.png" alt="">
                    </div>
                </div>
            </div>
            <ul class="row">
                @forelse($best_seller as $best_sell)
                    <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="product-wrap">
                            <div class="product-img">
                                <img
                                    src="{{ asset('uploads/product_photos/'.$best_sell->product->product_thumbnail_photo) }}"
                                    alt="">
                                <div class="product-icon flex-style">
                                    <ul>
                                        <li><a data-toggle="modal" data-target="#product_id_{{$best_sell->product->id}}"
                                               href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="{{url('add/to/wishlist/'.$best_sell->product->id)}}"><i
                                                    class="fa fa-heart"></i></a></li>
                                        <li><a href="{{url('cart')}}"><i class="fa fa-shopping-bag"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3>
                                    <a href="{{url('product/'.$best_sell->product->id)}}">{{$best_sell->product->product_name}}</a>
                                </h3>
                                <p class="pull-left">BDT. {{$best_sell->product->product_price}}

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
                @endforelse
            </ul>
        </div>
    </div>
    <!-- product-area end -->
    <!-- product-area start -->
    <div class="product-area">
        <div class="fluid-container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Our Latest Product</h2>
                        <img src="{{ asset('frontend_assets') }}/images/section-title.png" alt="">
                    </div>
                </div>
            </div>
            <ul class="row">
                @forelse($products as $product)
                    <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="product-wrap">
                            <div class="product-img">
                                <span>Sale</span>
                                <img src="{{ asset('uploads/product_photos/'.$product->product_thumbnail_photo) }}"
                                     alt="">
                                <div class="product-icon flex-style">
                                    <ul>
                                        <li><a data-toggle="modal" data-target="#product_id_{{$product->id}}"
                                               href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="{{url('add/to/wishlist/'.$product->id)}}"><i
                                                    class="fa fa-heart"></i></a></li>
                                        <li><a href="{{url('cart')}}"><i class="fa fa-shopping-bag"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{url('product/'.$product->id)}}">{{$product->product_name}}</a></h3>
                                <p class="pull-left">BDT. {{$product->product_price}}</p>
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
                    <p class="text-danger">No Product to show</p>
                @endforelse
                <li class="col-12 text-center">
                    {{--                    <a class="loadmore-btn" href="javascript:void(0);">Load More</a>--}}
                </li>
            </ul>
        </div>
    </div>
    <!-- product-area end -->
    <!-- testmonial-area start -->
    <div class="testmonial-area testmonial-area2 bg-img-2 black-opacity">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="test-title text-center">
                        <h2>What Our client Says</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1 col-12">
                    <div class="testmonial-active owl-carousel">
                        @forelse($testimonials as $testimonial)
                            <div class="test-items test-items2">
                                <div class="test-content">
                                    <p>{{$testimonial->speech}}</p>
                                    <h2>{{$testimonial->name}}</h2>
                                    <p>{{$testimonial->designation}}</p>
                                </div>
                                <div class="test-img2">
                                    <img src="{{ asset('uploads/testimonial_photos/'.$testimonial->client_photo) }}"
                                         style="width: 140px;height: 130px"
                                         alt="">
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-white">No data to show</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testmonial-area end -->
@endsection
