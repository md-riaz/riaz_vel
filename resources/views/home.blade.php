@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Dashboard</h4>
                    <h6>New users on {{$last_user->created_at->format('l, jS \\of F Y')}}</h6>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <p>Welcome to Laravel Framework <strong>' {{ Auth::user()->name }} '</strong></p>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Updated at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $row)
                            <tr>
                                <th scope="row">{{ $users->firstItem() + $loop->index }}</th>
                                <td> {{ $row->name }} </td>
                                <td> {{ $row->email }} </td>
                                <td> {{ $row->updated_at->format('l, jS \\of F Y h:i:s A') }}
                                    &#8608; {{$row->updated_at->diffForHumans()}}</td>
                                <td> {{ $row->created_at->format('l, jS \\of F Y h:i:s A') }} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- Pagination Links --}}
                    {{$users->links()}}
                    <p><strong>Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of total
                            {{$users->total()}} entries</strong></p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection