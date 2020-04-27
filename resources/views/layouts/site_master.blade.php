<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('site_title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('frontend_assets/images/favicon.png') }}">
    <!-- Place favicon.ico in the root directory -->
    <!-- all css here -->
    <!-- bootstrap v4.0.0-beta.2 css -->
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/bootstrap.min.css') }}">
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/owl.carousel.min.css">
    <!-- font-awesome v4.6.3 css -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/font-awesome.min.css">
    <!-- flaticon.css -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/flaticon.css">
    <!-- jquery-ui.css -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/jquery-ui.css">
    <!-- metisMenu.min.css -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/metisMenu.min.css">
    <!-- swiper.min.css -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/swiper.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/styles.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/responsive.css">
    <!-- modernizr css -->
    <script src="{{ asset('frontend_assets') }}/js/vendor/modernizr-2.8.3.min.js"></script>

    <style>
        button.btn-cart {
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
            font-size: 1em;
            position: initial;
        }
    </style>
</head>

<body>
<!-- Alert message on payment successful -->
@if (session('success'))
    <div id="success-alert">
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
            <strong>Success!</strong> {{session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif
<!--Start Preloader-->
<div class="preloader-wrap">
    <div class="spinner"></div>
</div>
<!-- search-form here -->
<div class="search-area flex-style">
    <span class="closebar">Close</span>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 col-12">
                <div class="search-form">
                    <form action="#">
                        <input type="text" placeholder="Search Here...">
                        <button><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- search-form here -->
@php
    $address = App\Address::find(1)->first();
@endphp
<!-- header-area start -->
<header class="header-area">
    <div class="header-top bg-2">
        <div class="fluid-container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <ul class="d-flex header-contact">
                        <li><i class="fa fa-phone"></i> {{$address->phone_number}}</li>
                        <li><i class="fa fa-envelope"></i>{{$address->email}}</li>
                    </ul>
                </div>
                <div class="col-md-6 col-12">
                    <ul class="d-flex account_login-area">
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-user"></i> My Account <i
                                    class="fa fa-angle-down"></i></a>
                            <ul class="dropdown_style">
                                <li><a href="{{url('/login')}}">Login</a></li>
                                <li><a href="{{url('customer/register')}}">Register</a></li>
                                <li><a href="{{url('cart')}}">Cart</a></li>
                                <li><a href="{{url('wishlist')}}">wishlist</a></li>
                            </ul>
                        </li>

                        <li>
                            @if (Route::has('login'))
                                @auth
                                    <a href="#"> Dashboard </a>
                                @else
                                    <a href="{{url('customer/register')}}">Login/Register </a>
                                @endauth
                            @endif


                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="fluid-container">
            <div class="row">
                <div class="col-lg-3 col-md-7 col-sm-6 col-6">
                    <div class="logo">
                        <a href="{{url('/')}}">
                            <img src="{{ asset('frontend_assets') }}/images/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 d-none d-lg-block">
                    <nav class="mainmenu">
                        <ul class="d-flex">
                            <li class="{{Request::path() === '/' ? 'active' : ''}}"><a href="{{'/'}}">Home</a></li>
                            <li class="{{Request::path() === 'about' ? 'active' : ''}}"><a
                                    href="{{route('about')}}">About</a>
                            </li>
                            <li>
                                <a href="{{url('shop')}}">Shop Page</a>
                            </li>
                            <li>
                                <a href="{{url('faqs')}}">FAQ</a>
                            </li>
                            <li>
                                <a href="{{url('blogs')}}">Blog </a>
                            </li>
                            <li class="{{Request::path() === 'contact' ? 'active' : ''}}"><a
                                    href="{{route('contact')}}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-4 col-lg-2 col-sm-5 col-4">
                    <ul class="search-cart-wrapper d-flex">
                        <li class="search-tigger"><a href="javascript:void(0);"><i class="flaticon-search"></i></a>
                        </li>
                        <li>
                            @php
                                $wishlist = \App\Wishlist::where('ip_address', request()->ip());
                            @endphp
                            <a href="javascript:void(0);"><i class="flaticon-like"></i>
                                <span>{{$wishlist->count()}}</span></a>
                            <ul class="cart-wrap dropdown_style">
                                @forelse($wishlist->get() as $wishlist)
                                    <li class="cart-items">
                                        <div class="cart-img">
                                            <img
                                                src="{{ asset('uploads/product_photos/'.$wishlist->product->product_thumbnail_photo) }}"
                                                alt="Product Photo" width="80">
                                        </div>
                                        <div class="cart-content">
                                            <a
                                                href="{{url('/product/'.$wishlist->product_id)}}">{{$wishlist->product->product_name}}</a>

                                            <p>BDT. {{$wishlist->product->product_price}}</p>
                                            <a href="{{url('remove/wishlist/'.$wishlist->id)}}"><i
                                                    class="fa fa-times"></i></a>
                                        </div>
                                    </li>
                                @empty
                                    <p>No item selected</p>
                                @endforelse
                                <li>
                                    <a href="{{url('wishlist')}}">
                                        <button>See Favorites</button>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            @php
                                $sub_total = 0;
                                $cart = \App\Cart::where('ip_address', request()->ip());
                            @endphp
                            <a href="javascript:void(0);"><i class="flaticon-shop"></i>
                                <span>
                                        {{$cart->count()}}
                                    </span></a>
                            <ul class="cart-wrap dropdown_style">
                                @forelse($cart->get() as $cart)
                                    <li class="cart-items">
                                        <div class="cart-img">
                                            <img
                                                src="{{ asset('uploads/product_photos/'.$cart->product->product_thumbnail_photo) }}"
                                                alt="Product Photo" width="80">
                                        </div>
                                        <div class="cart-content">
                                            <a
                                                href="{{url('/product/'.$cart->product_id)}}">{{$cart->product->product_name}}</a>
                                            <span>QTY : {{$cart->quantity}}</span>
                                            <p>BDT. {{$cart->product->product_price*$cart->quantity}}</p>
                                            <a href="{{url('remove/cart/'.$cart->id)}}"><i class="fa fa-times"></i></a>
                                            @php
                                                $sub_total = $sub_total + ($cart->product->product_price*$cart->quantity);
                                            @endphp
                                        </div>
                                    </li>
                                @empty
                                    <p>No item selected</p>
                                @endforelse
                                <li>Subtotol: <span class="pull-right">BDT. {{$sub_total}}</span></li>
                                <li>
                                    <a href="{{url('cart')}}">
                                        <button>Check Out</button>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-md-1 col-sm-1 col-2 d-block d-lg-none">
                    <div class="responsive-menu-tigger">
                        <a href="javascript:void(0);">
                            <span class="first"></span>
                            <span class="second"></span>
                            <span class="third"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- responsive-menu area start -->
        <div class="responsive-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-block d-lg-none">
                        <ul class="metismenu">
                            <li><a href="{{'/'}}">Home</a></li>
                            <li><a href="{{route('about')}}">About</a></li>
                            <li class="sidemenu-items">
                                <a href="{{url('shop')}}">Shop Page</a>
                            </li>
                            <li class="sidemenu-items">
                                <a href="{{url('faqs')}}">FAQ</a>
                            </li>
                            <li class="sidemenu-items">
                                <a href="{{url('blogs')}}">Blog </a>
                            </li>
                            <li><a href="{{route('contact')}}">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- responsive-menu area start -->
    </div>
</header>
<!-- header-area end -->

@yield('content')

<!-- start social-newsletter-section -->
<section class="social-newsletter-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="newsletter text-center">
                    <h3>Subscribe Newsletter</h3>
                    <div class="newsletter-form">
                        <form>
                            <input type="text" class="form-control" placeholder="Enter Your Email Address...">
                            <button type="submit"><i class="fa fa-send"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end container -->
</section>
<!-- end social-newsletter-section -->
<!-- .footer-area start -->
<div class="footer-area">
    <div class="footer-top">
        <div class="container">
            <div class="footer-top-item">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="footer-top-text text-center">
                            <ul>
                                <li><a href="{{'/'}}">home</a></li>
                                <li><a href="#">our story</a></li>
                                <li><a href="#">feed shop</a></li>
                                <li><a href="blog.html">how to eat blog</a></li>
                                <li><a href="contact.html">contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-12">
                    <div class="footer-icon">
                        <ul class="d-flex">
                            <li><a href="{{$address->facebook_url}}"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{$address->twitter_url}}"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{$address->linkedin_url}}"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="{{$address->gplus_url}}"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8 col-sm-12">
                    <div class="footer-content">
                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so
                            beguiled
                            and demoralized by the charms of pleasure righteous indignation and dislike</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-8 col-sm-12">
                    <div class="footer-adress">
                        <ul>
                            <li><a href="#"><span>Email:</span> {{$address->email}}</a></li>
                            <li><a href="#"><span>Tel:</span> {{$address->phone_number}}</a></li>
                            <li><a href="#"><span>Adress:</span>{{$address->address}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="footer-reserved">
                        <ul>
                            <li>Copyright © {{\Carbon\Carbon::now()->format('Y')}} Tohoney All rights reserved.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .footer-area end -->
@forelse(\App\Product::all() as $product)
    <!-- Modal area start -->
    <div class="modal fade" id="product_id_{{$product->id}}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body d-flex">
                    <div class="product-single-img w-50">
                        <img src="{{ asset('uploads/product_photos/'.$product->product_thumbnail_photo) }}" alt="">
                    </div>
                    <div class="product-single-content w-50">
                        <h3>{{$product->product_name}}</h3>
                        <div class="rating-wrap fix">
                            <span class="pull-left">BDT. {{$product->product_price}}</span>
                            <ul class="rating pull-right">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li>(05 Customar Review)</li>
                            </ul>
                        </div>
                        <p>{{$product->product_short_description}}/p>
                        <ul class="input-style">

                            @if($product->product_quantity == 0)
                                <div class="alert alert-danger">Product is out of stock</div>
                            @else
                                <form action="{{url('/add/to/cart')}}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$product->id}}" name="product_id"/>
                                    <li class="quantity cart-plus-minus">
                                        <input type="text" value="1" name="quantity"/>
                                    </li>
                                    <li>
                                        <button type="submit" class="btn-cart">Add to Cart</button>
                                    </li>
                                </form>
                            @endif
                        </ul>
                        <ul class="cetagory">
                            <li>Categories:</li>
                            <li><a href="#">{{$product->relationtocategory->category_name}}</a></li>
                        </ul>
                        <ul class="socil-icon">
                            <li>Share :</li>
                            <li><a href="{{$address->facebook_url}}"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{$address->twitter_url}}"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{$address->linkedin_url}}"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="{{$address->gplus_url}}"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal area end -->
@empty

@endforelse


<!-- jquery latest version -->
<script src="{{ asset('frontend_assets') }}/js/vendor/jquery-2.2.4.min.js"></script>
<!-- bootstrap js -->
<script src="{{ asset('frontend_assets') }}/js/bootstrap.min.js"></script>
<!-- owl.carousel.2.0.0-beta.2.4 css -->
<script src="{{ asset('frontend_assets') }}/js/owl.carousel.min.js"></script>
<!-- scrollup.js -->
<script src="{{ asset('frontend_assets') }}/js/scrollup.js"></script>
<!-- isotope.pkgd.min.js -->
<script src="{{ asset('frontend_assets') }}/js/isotope.pkgd.min.js"></script>
<!-- imagesloaded.pkgd.min.js -->
<script src="{{ asset('frontend_assets') }}/js/imagesloaded.pkgd.min.js"></script>
<!-- jquery.zoom.min.js -->
<script src="{{ asset('frontend_assets') }}/js/jquery.zoom.min.js"></script>
<!-- countdown.js -->
<script src="{{ asset('frontend_assets') }}/js/countdown.js"></script>
<!-- swiper.min.js -->
<script src="{{ asset('frontend_assets') }}/js/swiper.min.js"></script>
<!-- metisMenu.min.js -->
<script src="{{ asset('frontend_assets') }}/js/metisMenu.min.js"></script>
<!-- mailchimp.js -->
<script src="{{ asset('frontend_assets') }}/js/mailchimp.js"></script>
<!-- jquery-ui.min.js -->
<script src="{{ asset('frontend_assets') }}/js/jquery-ui.min.js"></script>
<!-- main js -->
<script src="{{ asset('frontend_assets') }}/js/scripts.js"></script>
<script>
    // When the btn clicked get the input value and concatinate with url and go
    $(function () {
        $('#applyCoupon').click(function (e) {
            let url = "{{url('cart')}}/" + $('#couponinput').val();
            window.location = url;
        });
        // remove alert after showing 5 sec
        $("#success-alert").fadeTo(5000, 500).slideUp(500, function () {
            $("#alert").slideUp(500);
        });
    });
</script>
</body>


<!-- Mirrored from themepresss.com/tf/html/tohoney/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Mar 2020 03:33:34 GMT -->

</html>
