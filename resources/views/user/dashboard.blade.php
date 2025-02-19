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
        @if(is_null(auth()->user()->validity) || auth()->user()->validity->isPast())
            <div class="col-md-12">
                <div class="alert alert-warning">
                    Your account validity has expired or new. Please make a payment of BDT 10 to renew your account.
                </div>
                <form action="{{ route('user.payment') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="amount" id="amount" value="10" class="form-control" required>
                        <input type="hidden" name="type" id="type" value="membership" class="form-control" required>
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
        <div class="col-md-4">
            <a href="{{route('user.jobs.index')}}">
            <div class="card-counter primary">
                <i class="fa fa-code-fork"></i>
                <span class="count-numbers">{{$jobs}}</span>
                <span class="count-name">Jobs</span>
            </div>
        </a>
        </div>

        <div class="col-md-4"><a href="{{route('user.blogs.index')}}">
            <div class="card-counter danger">
                <i class="fa fa-ticket"></i>
                <span class="count-numbers">{{$blogs}}</span>
                <span class="count-name">Blogs</span>
            </div>
            </a>
        </div>

        <div class="col-md-4"><a href="{{route('user.zooms.index')}}">
            <div class="card-counter success">
                <i class="fa fa-database"></i>
                <span class="count-numbers">{{$zooms}}</span>
                <span class="count-name">Meeting</span>
            </div>
            </a>
        </div>

    </div>
</div>
<br>
@endsection
