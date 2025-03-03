<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control','maxlength' => 191,'required']) !!}
</div>
<!-- Subtitle Field -->
<div class="form-group">
    {!! Form::label('subtitle', 'Sub Title:') !!}
    {!! Form::text('subtitle', null, ['class' => 'form-control',]) !!}
</div>
<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::number('amount', null, ['class' => 'form-control','step' => 'any','required']) !!}
</div>
<!-- Details Field -->
<div class="form-group">
    {!! Form::label('details', 'Details:') !!}
    {!! Form::textarea('details', null, ['class' => 'form-control','maxlength' => 65530,'required']) !!}
</div>
@isset($seminar)
<!-- Seminar Date Field -->
<div class="form-group ">
    {!! Form::label('seminar_date', 'Seminar Date:') !!}
    {!! Form::date('seminar_date', $seminar->seminar_date, ['class' => 'form-control','id'=>'seminar_date','required']) !!}
</div>
@else
<div class="form-group ">
    {!! Form::label('seminar_date', 'Seminar Date:') !!}
    {!! Form::date('seminar_date', null, ['class' => 'form-control','id'=>'seminar_date','required']) !!}
</div>
@endisset
<!-- Seminar Date Field -->
<div class="form-group ">
    {!! Form::label('seminar_time', 'Seminar Time:') !!}
    {!! Form::time('seminar_time', null, ['class' => 'form-control','id'=>'seminar_time','required','step' => 'any']) !!}
</div>

@isset($seminar)
<!-- Seminar Close Date Field -->
<div class="form-group ">
    {!! Form::label('seminar_close_date', 'Seminar Closing Date:') !!}
    {!! Form::date('seminar_close_date', $seminar->seminar_close_date, ['class' => 'form-control','id'=>'seminar_close_date','required']) !!}
</div>
@else
<div class="form-group ">
    {!! Form::label('seminar_close_date', 'Seminar Date:') !!}
    {!! Form::date('seminar_close_date', null, ['class' => 'form-control','id'=>'seminar_close_date','required']) !!}
</div>
<!-- Seminar Close Date Field -->
@endisset
<div class="form-group ">
    {!! Form::label('seminar_close_time', 'Seminar Closing Time:') !!}
    {!! Form::time('seminar_close_time', null, ['class' => 'form-control','id'=>'seminar_close_time','required','step' => 'any']) !!}
</div>


<!-- Place Field -->
<div class="form-group">
    {!! Form::label('place', 'Place:') !!}
    {!! Form::text('place', null, ['class' => 'form-control','maxlength' => 191,'required']) !!}
</div>

<!-- Image Field -->
@isset($seminar)
<img src="{{asset('images/'.$seminar->image)}}" alt="" srcset="">
@endisset
<div class="form-group">
    <br>
    {!! Form::label('image', 'Image:') !!}
    {!! Form::file('image') !!}
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group">
    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.seminars.index') }}" class="border-0 btn-transition btn btn-outline-info">Cancel</a>
</div>
@include('includes.ckeditor')
