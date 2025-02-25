@extends('layouts.admin')
@section('title')Update  Seminar Registration @endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">
                <h5 class="card-title text-primary"> Update  Seminar Registration</h5><br>
            </div>
            <div class="card-body">
                   {!! Form::model($seminarRegistration, ['route' => ['admin.seminarRegistrations.update', $seminarRegistration->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('admin.seminar_registrations.fields')

                   {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
