@extends('layouts.site_master')
@section('site_title')
    Product Details
@endsection
@section('content')
    <x-breadcump :title="$product->product_name" info="Shop"/>
    <!-- single-product-area start-->
    <div class="single-product-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-single-img">
                        <div class="product-active owl-carousel">
                            <div class="item">
                                <img src="{{asset('uploads/product_photos/'.$product->product_thumbnail_photo)}}"
                                     alt="Not Found">
                            </div>
                            @foreach($product_photos as $product_photo)
                                <div class="item">
                                    <img src="{{asset('uploads/product_multiple_photos/'.$product_photo->photo_name)}}"
                                         alt="Not Found">
                                </div>
                            @endforeach

                        </div>
                        <div class="product-thumbnil-active  owl-carousel">
                            <div class="item">
                                <img src="{{asset('uploads/product_photos/'.$product->product_thumbnail_photo)}}"
                                     alt="Not Found">
                            </div>
                            @foreach($product_photos as $product_photo)
                                <div class="item">
                                    <img src="{{asset('uploads/product_multiple_photos/'.$product_photo->photo_name)}}"
                                         alt="Not Found">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-single-content">
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
                        <p>{!! nl2br(e($product->product_short_description)) !!}</p>
                        <ul class="input-style">
                            <form action="{{url('/add/to/cart')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{$product->id}}" name="product_id"/>
                                <li class="quantity cart-plus-minus">
                                    <input type="text" value="1" name="quantity"/>
                                </li>
                                <li>

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
                                </li>
                            </form>
                            @if(session('cart_added'))
                                <li class="alert alert-success">{{session('cart_added')}}</li>
                            @endif
                        </ul>
                        <ul class="cetagory">
                            <li>Categories:</li>
                            <li><a href="#">{{$product->relationtocategory->category_name}}</a></li>
                        </ul>
                        <ul class="socil-icon">
                            <li>Share :</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mt-60">
                <div class="col-12">
                    <div class="single-product-menu">
                        <ul class="nav">
                            <li><a class="active" data-toggle="tab" href="#description">Description</a></li>
                            <li><a data-toggle="tab" href="#tag">Faq</a></li>
                            <li><a data-toggle="tab" href="#review">Review</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <div class="tab-content">
                        <div class="tab-pane active" id="description">
                            <div class="description-wrap">
                                <p>{!! nl2br(e($product->product_long_description)) !!}</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tag">
                            <div class="faq-wrap" id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5>
                                            <button data-toggle="collapse" data-target="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">General Inquiries ?
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                            dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                                            tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                            assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                            wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                            vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                            synth nesciunt you probably haven't heard of them accusamus labore
                                            sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5>
                                            <button class="collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                                    aria-expanded="false" aria-controls="collapseTwo">How To Use ?
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                            dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                                            tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                            assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                            wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                            vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                            synth nesciunt you probably haven't heard of them accusamus labore
                                            sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5>
                                            <button class="collapsed" data-toggle="collapse"
                                                    data-target="#collapseThree" aria-expanded="false"
                                                    aria-controls="collapseThree">Shipping & Delivery ?
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                            dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                                            tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                            assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                            wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                            vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                            synth nesciunt you probably haven't heard of them accusamus labore
                                            sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingfour">
                                        <h5>
                                            <button class="collapsed" data-toggle="collapse" data-target="#collapsefour"
                                                    aria-expanded="false" aria-controls="collapsefour">Additional
                                                Information ?
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapsefour" class="collapse" aria-labelledby="headingfour"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                            dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                                            tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                            assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                            wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                            vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                            synth nesciunt you probably haven't heard of them accusamus labore
                                            sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingfive">
                                        <h5>
                                            <button class="collapsed" data-toggle="collapse" data-target="#collapsefive"
                                                    aria-expanded="false" aria-controls="collapsefive">Return Policy ?
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapsefive" class="collapse" aria-labelledby="headingfive"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                            dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                                            tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                            assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                            wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                            vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                            synth nesciunt you probably haven't heard of them accusamus labore
                                            sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="review">
                            <div class="review-wrap">
                                <ul>
                                    <li class="review-items">
                                        <div class="review-img">
                                            <img src="{{asset('frontend_assets')}}/images/comment/1.png" alt="">
                                        </div>
                                        <div class="review-content">
                                            <h3><a href="#">GERALD BARNES</a></h3>
                                            <span>27 Jun, 2019 at 2:30pm</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan
                                                egestas elese ifend. Phasellus a felis at estei to bibendum feugiat ut
                                                eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                            <ul class="rating">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="review-items">
                                        <div class="review-img">
                                            <img src="{{asset('frontend_assets')}}/images/comment/2.png" alt="">
                                        </div>
                                        <div class="review-content">
                                            <h3><a href="#">Olive Oil</a></h3>
                                            <span>15 may, 2019 at 2:30pm</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan
                                                egestas elese ifend. Phasellus a felis at estei to bibendum feugiat ut
                                                eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                            <ul class="rating">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-half-o"></i></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="review-items">
                                        <div class="review-img">
                                            <img src="{{asset('frontend_assets')}}/images/comment/3.png" alt="">
                                        </div>
                                        <div class="review-content">
                                            <h3><a href="#">Nature Honey</a></h3>
                                            <span>14 janu, 2019 at 2:30pm</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan
                                                egestas elese ifend. Phasellus a felis at estei to bibendum feugiat ut
                                                eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                            <ul class="rating">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="add-review">
                                <h4>Add A Review</h4>
                                <div class="ratting-wrap">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th>task</th>
                                            <th>1 Star</th>
                                            <th>2 Star</th>
                                            <th>3 Star</th>
                                            <th>4 Star</th>
                                            <th>5 Star</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>How Many Stars?</td>
                                            <td>
                                                <input type="radio" name="a"/>
                                            </td>
                                            <td>
                                                <input type="radio" name="a"/>
                                            </td>
                                            <td>
                                                <input type="radio" name="a"/>
                                            </td>
                                            <td>
                                                <input type="radio" name="a"/>
                                            </td>
                                            <td>
                                                <input type="radio" name="a"/>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <h4>Name:</h4>
                                        <input type="text" placeholder="Your name here..."/>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <h4>Email:</h4>
                                        <input type="email" placeholder="Your Email here..."/>
                                    </div>
                                    <div class="col-12">
                                        <h4>Your Review:</h4>
                                        <textarea name="massage" id="massage" cols="30" rows="10"
                                                  placeholder="Your review here..."></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn-style">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single-product-area end-->
    <!-- featured-product-area start -->
    <div class="featured-product-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-left">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse($related as $product)
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="featured-product-wrap">
                            <div class="featured-product-img">
                                <img src="{{asset('uploads/product_photos/'.$product->product_thumbnail_photo)}}"
                                     alt="">
                            </div>
                            <div class="featured-product-content">
                                <div class="row">
                                    <div class="col-7">
                                        <h3><a href="{{url('/product/'.$product->id)}}">{{$product->product_name}}</a>
                                        </h3>
                                        <p>BDT. {{$product->product_price}}</p>
                                    </div>
                                    <div class="col-5 text-right">
                                        <ul>
                                            <li>
                                                <a href="{{url('cart')}}"><i class="fa fa-shopping-cart"></i></a>

                                            </li>
                                            <li><a href="{{url('wishlist')}}"><i class="fa fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No relative product to show</p>
                @endforelse
            </div>
        </div>
    </div>
    <!-- featured-product-area end -->
@endsection
