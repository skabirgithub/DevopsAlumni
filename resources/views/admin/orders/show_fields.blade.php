<!-- Name Field -->
<div class="form-group">
    <b>{!! Form::label('name', 'Name:') !!}</b>
    <p>{{ $order->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    <b>{!! Form::label('email', 'Email:') !!}</b>
    <p>{{ $order->email }}</p>
</div>

<!-- Phone Field -->
<div class="form-group">
    <b>{!! Form::label('phone', 'Phone:') !!}</b>
    <p>{{ $order->phone }}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    <b>{!! Form::label('amount', 'Amount:') !!}</b>
    <p>{{ $order->amount }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    <b>{!! Form::label('address', 'Address:') !!}</b>
    <p>{{ $order->address }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    <b>{!! Form::label('created_at', 'Created At:') !!}</b>
    <p>{{ $order->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    <b>{!! Form::label('updated_at', 'Updated At:') !!}</b>
    <p>{{ $order->updated_at }}</p>
</div>

