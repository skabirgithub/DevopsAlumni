@extends('layouts.admin')
@section('title')Update  Order @endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">
                <h5 class="card-title text-primary"> Update  Order</h5><br>
            </div>
            <div class="card-body">
                   {!! Form::model($order, ['route' => ['admin.orders.update', $order->id], 'method' => 'patch']) !!}

                        @include('admin.orders.fields')

                   {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
