@extends('layouts.admin')
@section('title')Create Testimonial @endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">
                <h5 class="card-title text-primary"> Create Testimonial</h5><br>
            </div>
            <div class="card-body">
                    {!! Form::open(['route' => 'admin.testimonials.store', 'enctype' => 'multipart/form-data']) !!}

                        @include('admin.testimonials.fields')

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
