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
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                    </tr>
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