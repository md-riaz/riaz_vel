@extends('layouts.master')
@section('header')
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>All Deleted Messages</h4>
                    <span>messages that are deleted is here</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">

            {{-- Navigation Breadcrumb  --}}
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">

                    <li class="breadcrumb-item">
                        <a href="{{url('home')}}"> <i class="feather icon-home"></i> </a>
                    </li>

                    <li class="breadcrumb-item"><a href="{{route('messages')}}">messages</a></li>
                    <li class="breadcrumb-item"><a href="#!">trash</a></li>

                </ul>
            </div>
        </div>
    </div>
@endsection
@section('body')
    <div class="card">

        <div class="card-block">
            {{-- Print success notification from sesson --}}
            @if (session('success_message'))
                <div class="alert alert-success" role="alert">
                    {{session('success_message')}}
                </div>
            @endif
            <div class="table-responsive p-15">
                <table class="table">
                    <thead>
                    <tr class="border-bottom-danger">
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Deleted at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($trash as $msg)

                        <tr class="border-bottom-primary">
                            <td>{{$loop->index+1}}</td>
                            <td>{{$msg->name}}</td>
                            <td>{{$msg->email}}</td>
                            <td>{{$msg->message}}</td>
                            <td>{{$msg->deleted_at->diffForHumans()}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Button group">
                                    <a href="{{url('messages/restore/'.$msg->id)}}" type="button"
                                       class="btn btn-info"><i class="icofont icofont-bubble-up"></i></a>
                                    <a href="{{url('messages/hard-delete/'.$msg->id)}}" type="button"
                                       class="btn btn-danger"><i class="icofont icofont-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <td colspan="10" class="text-danger">Nothing to show</td>
                    @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
