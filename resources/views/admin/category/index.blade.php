@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    List Category
                </div>
            </div>
            <table class="table table-light table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>User Name</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$category->category_name}}</td>
                        <td>{{App\User::find($category->user_id)->name}}</td>
                        <td>
                            @if ($category->created_at)
                            {{$category->created_at->diffForHumans()}}
                            @else
                            <span class="text-danger">No time availabe</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Button group">
                                <a href="{{url('update/category/'.$category->id)}}" type="button"
                                    class="btn btn-info">Update</a>
                                <a href="" type="button" class="btn btn-danger">Delete</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>...</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Add Category
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
                            <button class="btn btn-dark" type="submit">Add Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection