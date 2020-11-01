<!-- Title Field -->
<div class="form-group">
    <b>{!! Form::label('title', 'Title:') !!}</b>
    <p>{{ $seminar->title }}</p>
</div>

<!-- Details Field -->
<div class="form-group">
    <b>{!! Form::label('details', 'Details:') !!}</b>
    <p>{{ $seminar->details }}</p>
</div>

<!-- Seminal Date Field -->
<div class="form-group">
    <b>{!! Form::label('seminal_date', 'Seminal Date:') !!}</b>
    <p>{{ $seminar->seminal_date }}</p>
</div>

<!-- Seminal Time Field -->
<div class="form-group">
    <b>{!! Form::label('seminal_time', 'Seminal Time:') !!}</b>
    <p>{{ $seminar->seminal_time }}</p>
</div>

<!-- Place Field -->
<div class="form-group">
    <b>{!! Form::label('place', 'Place:') !!}</b>
    <p>{{ $seminar->place }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    <b>{!! Form::label('image', 'Image:') !!}</b>
    <p>{{ $seminar->image }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    <b>{!! Form::label('created_at', 'Created At:') !!}</b>
    <p>{{ $seminar->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    <b>{!! Form::label('updated_at', 'Updated At:') !!}</b>
    <p>{{ $seminar->updated_at }}</p>
</div>

