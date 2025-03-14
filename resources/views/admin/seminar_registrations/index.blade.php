@extends('layouts.admin')
@section('title')Seminar Registrations @endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">
                <h5 class="card-title text-primary">Manage Seminar Registrations </h5><br>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @include('admin.seminar_registrations.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

