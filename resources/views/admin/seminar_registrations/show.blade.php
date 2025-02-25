@extends('layouts.admin')
@section('title')View  Seminar Registration Details @endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">
                <h5 class="card-title text-primary"> View  Seminar Registration Details</h5><br>
            </div>
            <div class="card-body">
                    @include('admin.seminar_registrations.show_fields')
                    <a href="{{ route('admin.seminarRegistrations.index') }}" class="btn-transition btn btn-outline-info">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
