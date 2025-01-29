<!-- Name Field -->
<div class="form-group">
    <b>{!! Form::label('name', 'Name:') !!}</b>
    <p>{{ $testimonial->name }}</p>
</div>

<!-- Designation Field -->
<div class="form-group">
    <b>{!! Form::label('designation', 'Designation:') !!}</b>
    <p>{{ $testimonial->designation }}</p>
</div>

<!-- Message Title Field -->
<div class="form-group">
    <b>{!! Form::label('message_title', 'Message Title:') !!}</b>
    <p>{{ $testimonial->message_title }}</p>
</div>

<!-- Message Subject Field -->
<div class="form-group">
    <b>{!! Form::label('message_subject', 'Message Subject:') !!}</b>
    <p>{{ $testimonial->message_subject }}</p>
</div>

<!-- Details Field -->
<div class="form-group">
    <b>{!! Form::label('details', 'Details:') !!}</b>
    <p>{{ $testimonial->details }}</p>
</div>

<div class="form-group">
    <label>Image</label><br>
    <img src="{{asset('images/'.$testimonial->image)}}" alt=""> <br>
</div>

<!-- Created At Field -->
<div class="form-group">
    <b>{!! Form::label('created_at', 'Created At:') !!}</b>
    <p>{{ $testimonial->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    <b>{!! Form::label('updated_at', 'Updated At:') !!}</b>
    <p>{{ $testimonial->updated_at }}</p>
</div>

