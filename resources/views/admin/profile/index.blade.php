@extends('layouts.master')
@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header bg-inverse">
                    Profile Edit
                </div>
                <div class="card-body">
                    {{-- Print success notification from sesson --}}
                    @if (session('success_message'))
                    <div class="alert alert-success" role="alert">
                        {{session('success_message')}}
                    </div>
                    @endif
                    <form method="post" action="{{ url('profile/post')}}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" class="form-control" type="text" name="name"
                                value="{{Str::title(Auth::user()->name)}}">
                            {{-- Str::title() for showing name formated --}}
                            @error('name')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-dark" type="submit">Change Name</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header bg-inverse">
                    Change Password
                </div>
                <div class="card-body">
                    {{-- Print success notification from sesson --}}
     
                    @if (session('password_change_status'))
                    <div class="alert alert-success" role="alert">
                        {{session('password_change_status')}}
                    </div>
                    @endif
                    {{-- Check all error message from controller --}}
                    @if ($errors->all())
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </div>
                    @endif
                    {{-- Check all error message from controller --}}
                    <form method="post" action="{{ url('password/post')}}">
                        @csrf
                        <div class="form-group">
                            <label for="old_password">Enter current password</label>
                            <input id="old_password" class="form-control" type="password" name="old_password"
                                placeholder="Your current Password here" value="{{old('old_password')}}">
                            @error('old_password')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Enter New password</label>
                            <input id="password" class="form-control" type="password" name="password"
                                placeholder="Your New Password here" value="{{old('password')}}">
                            @error('password')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm New password</label>
                            <input id="confirm_password" class="form-control" type="password"
                                name="password_confirmation" placeholder="Confirm Password here">
                            @error('password_confirmation')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-dark" type="submit">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection