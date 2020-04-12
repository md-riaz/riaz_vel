@extends('layouts.master')
@section('header')
<div class="row align-items-end">
    <div class="col-lg-8">
        <div class="page-header-title">
            <div class="d-inline">
                <h4>Home</h4>
                <span>this is the main page</span>
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

                <li class="breadcrumb-item"><a href="#!">Users</a> </li>

            </ul>
        </div>
    </div>
</div>
@endsection
@section('body')

<div class="card">
    <div class="card-header">
        <h5>All Users</h5>
        <span>New user on {{$last_user->created_at->format('l, jS \\of F Y')}}</span>

    </div>
    <div class="card-block">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="example-2">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $row)
                    <tr>
                        <th scope="row">{{ $users->firstItem() + $loop->index }}</th>
                        <td> {{ $row->name }} </td>
                        <td> {{ $row->email }} </td>
                        <td> {{ $row->updated_at->format('l, jS \\of F Y h:i:s A') }}
                            <br> &#8608; {{$row->updated_at->diffForHumans()}}</td>
                        <td> {{ $row->created_at->format('l, jS \\of F Y h:i:s A') }} </td>
                        {{-- <td>
                            <a href="" class="btn text-success"><i class="feather icon-edit"></i></a>
                            <a href="" class="btn text-danger "><span class="icofont icofont-ui-delete"></span></a>
                        </td> --}}
                    </tr>
                    @empty
                    @endforelse


                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection