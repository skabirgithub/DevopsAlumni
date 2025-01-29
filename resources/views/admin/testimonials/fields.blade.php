<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Designation Field -->
<div class="form-group">
    {!! Form::label('designation', 'Designation:') !!}
    {!! Form::text('designation', null, ['class' => 'form-control']) !!}
</div>

<!-- Message Title Field -->
<div class="form-group">
    {!! Form::label('message_title', 'Message Title:') !!}
    {!! Form::text('message_title', null, ['class' => 'form-control']) !!}
</div>

<!-- Message Subject Field -->
<div class="form-group">
    {!! Form::label('message_subject', 'Message Subject:') !!}
    {!! Form::text('message_subject', null, ['class' => 'form-control']) !!}
</div>

<!-- Details Field -->
<div class="form-group">
    {!! Form::label('details', 'Details:') !!}
    {!! Form::textarea('details', null, ['class' => 'form-control','maxlength' => 65530]) !!}
</div>

@if (isset($testimonial))
    <div class="form-group">
        <label>Image</label><br>
        <img src="{{asset('images/'.$testimonial->image)}}" alt=""> <br>
    </div>
@endif

<div class="form-group">
    {!! Form::label('image', 'Upload Image:') !!}
    {!! Form::file('image', ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group">
    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.testimonials.index') }}" class="border-0 btn-transition btn btn-outline-info">Cancel</a>
</div>
