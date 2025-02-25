<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Seminar Id Field -->
<div class="form-group">
    {!! Form::label('seminar_id', 'Seminar Id:') !!}
    {!! Form::number('seminar_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Order Id Field -->
<div class="form-group">
    {!! Form::label('order_id', 'Order Id:') !!}
    {!! Form::number('order_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Amount Field -->
<div class="form-group">
    {!! Form::label('payment_amount', 'Payment Amount:') !!}
    {!! Form::number('payment_amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Date Field -->
<div class="form-group ">
    {!! Form::label('payment_date', 'Payment Date:') !!}
    {!! Form::date('payment_date', null, ['class' => 'form-control','id'=>'payment_date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#payment_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Transaction Id Field -->
<div class="form-group">
    {!! Form::label('transaction_id', 'Transaction Id:') !!}
    {!! Form::textarea('transaction_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Note Field -->
<div class="form-group">
    {!! Form::label('note', 'Note:') !!}
    {!! Form::textarea('note', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
@isset($seminarRegistration)
<img src="{{asset('images/'.$seminarRegistration->image)}}" alt="" srcset="">
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
    <a href="{{ route('admin.seminarRegistrations.index') }}" class="border-0 btn-transition btn btn-outline-info">Cancel</a>
</div>
