<!-- User Id Field -->
<div class="form-group">
    <b>{!! Form::label('user_id', 'User Id:') !!}</b>
    <p>{{ $seminarRegistration->user_id }}</p>
</div>

<!-- Seminar Id Field -->
<div class="form-group">
    <b>{!! Form::label('seminar_id', 'Seminar Id:') !!}</b>
    <p>{{ $seminarRegistration->seminar_id }}</p>
</div>

<!-- Order Id Field -->
<div class="form-group">
    <b>{!! Form::label('order_id', 'Order Id:') !!}</b>
    <p>{{ $seminarRegistration->order_id }}</p>
</div>

<!-- Payment Amount Field -->
<div class="form-group">
    <b>{!! Form::label('payment_amount', 'Payment Amount:') !!}</b>
    <p>{{ $seminarRegistration->payment_amount }}</p>
</div>

<!-- Payment Date Field -->
<div class="form-group">
    <b>{!! Form::label('payment_date', 'Payment Date:') !!}</b>
    <p>{{ $seminarRegistration->payment_date }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    <b>{!! Form::label('status', 'Status:') !!}</b>
    <p>{{ $seminarRegistration->status }}</p>
</div>

<!-- Transaction Id Field -->
<div class="form-group">
    <b>{!! Form::label('transaction_id', 'Transaction Id:') !!}</b>
    <p>{{ $seminarRegistration->transaction_id }}</p>
</div>

<!-- Note Field -->
<div class="form-group">
    <b>{!! Form::label('note', 'Note:') !!}</b>
    <p>{{ $seminarRegistration->note }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    <b>{!! Form::label('image', 'Image:') !!}</b>
    <p>{{ $seminarRegistration->image }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    <b>{!! Form::label('created_at', 'Created At:') !!}</b>
    <p>{{ $seminarRegistration->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    <b>{!! Form::label('updated_at', 'Updated At:') !!}</b>
    <p>{{ $seminarRegistration->updated_at }}</p>
</div>

