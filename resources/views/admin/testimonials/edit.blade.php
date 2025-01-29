@extends('layouts.admin')
@section('title')Update  Testimonial @endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">
                <h5 class="card-title text-primary"> Update  Testimonial</h5><br>
            </div>
            <div class="card-body">
                   {!! Form::model($testimonial, ['route' => ['admin.testimonials.update', $testimonial->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}
                        @include('admin.testimonials.fields')
                   {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
