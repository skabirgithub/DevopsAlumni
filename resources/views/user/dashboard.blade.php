@extends('layouts.frontend')
@section('title','Dashboard')
@section('content')
@include('includes.banner',['title'=>'Dashboard','details'=>'This is a page. This is a demo paragraph.This is
a demo
senten.'])
<link rel="stylesheet" href="{{asset('my_files/mycss_index.css')}}">
<br>

<div class="container">
    <div class="row">
        @if(is_null(auth()->user()->profile->validity) ||
        \Carbon\Carbon::parse(auth()->user()->profile->validity)->isPast())
        <div class="col-md-12">
            <div class="alert alert-warning">
                Your account validity has expired or is new. Please make a payment of BDT 10 to renew your account.
            </div>
            <form action="{{ route('user.payment') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="amount" id="amount" value="10" class="form-control" required>
                    <input type="hidden" name="type" id="type" value="membership" class="form-control" required>
                    <input type="hidden" name="type_id" id="type_id" value="{{ Auth::user()->id }}" class="form-control"
                        required>
                </div>
                <button type="submit" class="btn btn-brand">Pay Now</button>
            </form>
        </div>
        @endif

    </div>
</div>

<!------ Include the above in your HEAD tag ---------->
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <a href="{{route('user.jobs.index')}}">
                <div class="card-counter primary">
                    <i class="fa fa-code-fork"></i>
                    <span class="count-numbers">{{$jobs}}</span>
                    <span class="count-name">Jobs</span>
                </div>
            </a>
        </div>

        <div class="col-md-3"><a href="{{route('user.blogs.index')}}">
                <div class="card-counter danger">
                    <i class="fa fa-image"></i>
                    <span class="count-numbers">{{$blogs}}</span>
                    <span class="count-name">Blogs</span>
                </div>
            </a>
        </div>

        {{-- <div class="col-md-4"><a href="{{route('user.zooms.index')}}">
                <div class="card-counter success">
                    <i class="fa fa-database"></i>
                    <span class="count-numbers">{{$zooms}}</span>
                    <span class="count-name">Meeting</span>
                </div>
            </a>
        </div> --}}
        <div class="col-md-3"><a href="#">
                <div class="card-counter info">
                    <i class="fa fa-ticket"></i>
                    <span class="count-numbers">{{$seminars}}</span>
                    <span class="count-name">Events</span>
                </div>
            </a>
        </div>
        <div class="col-md-3"><a href="#">
                <div class="card-counter success">
                    <i class="fa fa-database"></i>
                    <span class="count-numbers">{{$orders->count()}}</span>
                    <span class="count-name">Transactions</span>
                </div>
            </a>
        </div>

    </div>
</div>
<br>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Recent Transactions</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$order->amount}}</td>
                        <td>{{$order->type}}</td>
                        <td>{{$order->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
