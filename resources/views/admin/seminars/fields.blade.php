<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control','maxlength' => 191,'required']) !!}
</div>

<!-- Details Field -->
<div class="form-group">
    {!! Form::label('details', 'Details:') !!}
    {!! Form::textarea('details', null, ['class' => 'form-control','maxlength' => 65530,'required']) !!}
</div>

<!-- Seminal Date Field -->
<div class="form-group ">
    {!! Form::label('seminal_date', 'Seminal Date:') !!}
    {!! Form::date('seminal_date', null, ['class' => 'form-control','id'=>'seminal_date','required']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#seminal_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Place Field -->
<div class="form-group">
    {!! Form::label('place', 'Place:') !!}
    {!! Form::text('place', null, ['class' => 'form-control','maxlength' => 191]) !!}
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
