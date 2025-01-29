@extends('layouts.admin')
@section('title')View  Testimonial Details @endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">
                <h5 class="card-title text-primary"> View  Testimonial Details</h5><br>
            </div>
            <div class="card-body">
                    @include('admin.testimonials.show_fields')
                    <a href="{{ route('admin.testimonials.index') }}" class="btn-transition btn btn-outline-info">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
