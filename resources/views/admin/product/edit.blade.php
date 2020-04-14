@extends('layouts.master')
@section('header')
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Product Update</h4>
                    <span>all the details about product is here</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">

            {{-- Navigation Breadcrumb  --}}
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">

                    <li class="breadcrumb-item">
                        <a href="{{url('home')}}"> <i class="feather icon-home"></i>
                        </a>
                    </li>

                    <li class="breadcrumb-item"><a href="{{url('add/products')}}">Products</a></li>
                    <li class="breadcrumb-item"><a href="#!">{{$product->product_name}}</a></li>

                </ul>
            </div>
        </div>
    </div>
@endsection

@section('body')
    {{-- update Product --}}
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5> Update Product</h5>
                    <span>update an existing product here</span>

                </div>
                <div class="card-block">

                    {{-- Print success notification from sesson --}}
                    @if (session('success_message'))
                        <div class="alert alert-success" role="alert">
                            {{session('success_message')}}
                        </div>
                    @endif
                    <form method="post" action="{{ url('product/update/')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input required id="product_name" class="form-control" type="text" name="product_name"
                                   value="{{$product->product_name}}">
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            @error('product_name')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Select a category</label>
                            <select name="category_id" class="form-control form-control-primary">
                                <option value="opt1" disabled>Select One Value Only</option>
                                @forelse($categories as $category)
                                    <option
                                        value="{{$category->id}}" {{$product->category_id === $category->id ? 'selected' : ''}}>{{$category->category_name}}</option>
                                @empty
                                    <p class="text-danger">No categories available</p>
                                @endforelse
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="product_price">Product Price</label>
                            <input required id="product_price" class="form-control" type="number" step="0.01"
                                   name="product_price" value="{{$product->product_price}}">
                            @error('product_price')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="product_thumbnail_photo">Current Product Thumbnail</label>
                            <img src="{{asset('uploads/product_photos/'.$product->product_thumbnail_photo)}}" alt=""
                                 class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="product_thumbnail_photo">New Product Thumbnail</label>
                            <input type="file" class="form-control-file" id="product_thumbnail_photo"
                                   name="product_thumbnail_photo">
                            @error('product_thumbnail_photo')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="product_quantity">Product Quantity</label>
                            <input required type="number" step="0.01" class="form-control" id="product_quantity"
                                   name="product_quantity" value="{{$product->product_quantity}}">
                            @error('product_quantity')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="product_short_description">Product Short Description</label>
                            <input required type="text" class="form-control" id="product_short_description"
                                   name="product_short_description" value="{{$product->product_short_description}}">
                            @error('product_short_description')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="product_long_description">Product Details</label>
                            <textarea type="file" class="form-control" id="product_long_description"
                                      name="product_long_description"
                                      rows="4">{{$product->product_long_description}}</textarea>
                            @error('product_long_description')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <button class="btn btn-dark" type="submit">Update Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection
