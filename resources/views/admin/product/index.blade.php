@extends('layouts.master')
@section('header')
<div class="row align-items-end">
    <div class="col-lg-8">
        <div class="page-header-title">
            <div class="d-inline">
                <h4>Product</h4>
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

                <li class="breadcrumb-item"><a href="#!">Products</a></li>

            </ul>
        </div>
    </div>
</div>
@endsection

@section('body')
{{-- Add new Product --}}
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5> Add Product</h5>
                <span>add new product here</span>

            </div>
            <div class="card-block">

                {{-- Print success notification from sesson --}}
                @if (session('success_message'))
                <div class="alert alert-success" role="alert">
                    {{session('success_message')}}
                </div>
                @endif
                <form method="post" action="{{ url('store/product')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input required id="product_name" class="form-control" type="text" name="product_name">
                        @error('product_name')
                        <div class="alert alert-warning" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Select a category</label>
                        <select name="category_id" class="form-control form-control-primary" required>
                            <option value="opt1" disabled selected>Select One Value Only</option>
                            @forelse($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @empty
                                <p class="text-danger">No categories available</p>
                            @endforelse
                        </select>
                        @error('category_id')
                        <div class="alert alert-warning" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="product_price">Product Price</label>
                        <input required id="product_price" class="form-control" type="number" step="0.01"
                               name="product_price">
                        @error('product_price')
                        <div class="alert alert-warning" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="product_thumbnail_photo">Product Thumbnail</label>
                        <input required type="file" class="form-control-file" id="product_thumbnail_photo"
                            name="product_thumbnail_photo">
                        @error('product_thumbnail_photo')
                        <div class="alert alert-warning" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="product_photos">Product Photos</label>
                        <input required type="file" class="form-control-file" id="product_photos"
                            name="product_photos[]" multiple>
                        @error('product_photos')
                        <div class="alert alert-warning" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="product_quantity">Product Quantity</label>
                        <input required type="number" step="0.01" class="form-control" id="product_quantity"
                            name="product_quantity">
                        @error('product_quantity')
                        <div class="alert alert-warning" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="product_short_description">Product Short Description</label>
                        <input required type="text" class="form-control" id="product_short_description"
                            name="product_short_description">
                        @error('product_short_description')
                        <div class="alert alert-warning" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="product_long_description">Product Details</label>
                        <textarea type="file" class="form-control" id="product_long_description"
                            name="product_long_description" rows="4"></textarea>
                        @error('product_long_description')
                        <div class="alert alert-warning" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <button class="btn btn-dark" type="submit">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{--    All Product List--}}
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5> All Product List </h5>
                <span>all banners are here</span>

            </div>
            <div class="card-block table-border-style">

                {{--                    Print success notification from sesson--}}
                @if (session('update_status'))
                <div class="alert alert-success icons-alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="icofont icofont-close-line-circled"></i>
                    </button>
                    <p><strong>Success!</strong> {{session('update_status')}}</p>
                </div>
                @endif
                @if (session('delete_status'))
                <div class="alert alert-success icons-alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="icofont icofont-close-line-circled"></i>
                    </button>
                    <p><strong>Success!</strong> {{session('delete_status')}}</p>
                </div>
                @endif
                @if (session('restore_message'))
                <div class="alert alert-success icons-alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="icofont icofont-close-line-circled"></i>
                    </button>
                    <p><strong>Success!</strong> {{session('restore_message')}}</p>
                </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h5>List View</h5>

                    </div>
                    <div class="row card-block">
                        <div class="col-md-12">
                            <ul class="list-view">
                                @forelse ($products as $product)
                                <li>
                                    <div class="card list-view-media">
                                        <div class="card-block">
                                            <div class="media">
                                                <a class="media-left" href="#">
                                                    <img class="media-object card-list-img"
                                                        src="{{asset('uploads/product_photos/'.$product->product_thumbnail_photo)}}"
                                                        alt="Generic placeholder image" width="200">
                                                </a>
                                                <div class="media-body">
                                                    <div class="col-xs-12">
                                                        <label class="label label-info">{{$loop->index+1}}</label>
                                                        <h6 class="d-inline-block">{{$product->product_name}}</h6>
                                                    </div>
                                                    <div class="f-13 text-muted m-b-15">
                                                        <strong>Category: </strong>
                                                        {{$product->relationtocategory->category_name}}
                                                    </div>
                                                    <p>
                                                        <strong> Price:</strong> {{$product->product_price}}
                                                        <br>
                                                    </p>
                                                    <p>
                                                        <strong>
                                                            Quantity:</strong> {{$product->product_quantity}}
                                                        <br>
                                                    </p>
                                                    <p>
                                                        <strong> Short Description
                                                            :</strong> {{$product->product_short_description}}
                                                        <br>
                                                    </p>
                                                    <p>
                                                        <b>Details : </b> {{$product->product_long_description}}
                                                    </p>
                                                    <div class="m-t-15">

                                                        <a href="{{url('product/update/'.$product->id)}}">
                                                            <button type="button" data-toggle="tooltip" title=""
                                                                class="btn waves-effect waves-light"
                                                                data-original-title="Edit">
                                                                <i class="icofont icofont-edit"></i>
                                                            </button>
                                                        </a>
                                                        <a href="{{url('product/delete/'.$product->id)}}">
                                                            <button type="button" data-toggle="tooltip" title=""
                                                                class="btn waves-effect waves-light bg-danger"
                                                                data-original-title="Send to trash">
                                                                <i class="ti-trash"></i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @empty
                                <p class="text-danger">Nothing to show</p>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
{{-- Deleted product list --}}
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-danger">
                <h5 class="text-white">Deleted Product List </h5>
                <span class="text-white">all deleted banners are here</span>

            </div>
            <div class="card-block table-border-style">

                {{-- Print success notification from sesson --}}
                @if (session('fdelete'))
                <div class="alert alert-success icons-alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="icofont icofont-close-line-circled"></i>
                    </button>
                    <p><strong>Success!</strong> {{session('fdelete')}}</p>
                </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h5>List View</h5>

                    </div>
                    <div class="row card-block">
                        <div class="col-md-12">
                            <ul class="list-view">
                                @forelse ($products_trash as $product)
                                <li>
                                    <div class="card list-view-media">
                                        <div class="card-block">
                                            <div class="media">
                                                <a class="media-left" href="#">
                                                    <img class="media-object card-list-img"
                                                        src="{{asset('uploads/product_photos/'.$product->product_thumbnail_photo)}}"
                                                        alt="Generic placeholder image" width="200">
                                                </a>
                                                <div class="media-body">
                                                    <div class="col-xs-12">
                                                        <label class="label label-info">{{$loop->index+1}}</label>
                                                        <h6 class="d-inline-block">{{$product->product_name}}</h6>
                                                    </div>
                                                    <div class="f-13 text-muted m-b-15">
                                                        <strong>Category: </strong>
                                                        {{App\Category::findOrFail($product->category_id)->category_name}}
                                                    </div>
                                                    <p>
                                                        <strong> Price:</strong> {{$product->product_price}}
                                                        <br>
                                                    </p>
                                                    <p>
                                                        <strong>
                                                            Quantity:</strong> {{$product->product_quantity}}
                                                        <br>
                                                    </p>
                                                    <p>
                                                        <strong> Short Description
                                                            :</strong> {{$product->product_short_description}}
                                                        <br>
                                                    </p>
                                                    <p>
                                                        <b>Details : </b> {{$product->product_long_description}}
                                                    </p>
                                                    <div class="m-t-15">

                                                        <a href="{{url('product/restore/'.$product->id)}}">
                                                            <button type="button" data-toggle="tooltip" title=""
                                                                class="btn waves-effect waves-light"
                                                                data-original-title="Restore">
                                                                <i class="icofont icofont-bubble-up"></i>
                                                            </button>
                                                        </a>
                                                        <a href="{{url('product/hard-delete/'.$product->id)}}">
                                                            <button type="button" data-toggle="tooltip" title=""
                                                                class="btn waves-effect waves-light bg-danger"
                                                                data-original-title="Delete Permanently">
                                                                <i class="ti-trash"></i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @empty
                                <p class="text-danger">Nothing to show</p>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



@endsection
