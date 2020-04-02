@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 m-auto">
            <div class="card">
                <div class="card-header">
                    Update Category
                </div>
                <div class="card-body">
                    {{-- Print success notification from sesson --}}
                    @if (session('success_message'))
                    <div class="alert alert-success" role="alert">
                        {{session('success_message')}}
                    </div>
                    @endif
                    <form method="post" action="{{ url('store/category')}}">
                        @csrf
                        <div class="form-group">
                            <label for="category_name">Category Name</label>
                            <input id="category_name" class="form-control" type="text" name="category_name">
                            @error('category_name')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-dark" type="submit">Update Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection