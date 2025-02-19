@extends('layouts.admin')
@section('title')View  Order Details @endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">
                <h5 class="card-title text-primary"> View  Order Details</h5><br>
            </div>
            <div class="card-body">
                    @include('admin.orders.show_fields')
                    <a href="{{ route('admin.orders.index') }}" class="btn-transition btn btn-outline-info">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
