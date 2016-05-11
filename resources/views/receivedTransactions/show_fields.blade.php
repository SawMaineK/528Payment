<!-- Payment User Id Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('payment_user_id', Lang::get('receivedTransactions/show_fields.payment_user_id'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $receivedTransaction['paymentUser']['id'] !!}</p>
        </div>
    </div>

</div>

<!-- Receiver Id Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('receiver_id', Lang::get('receivedTransactions/show_fields.receiver_id'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $receivedTransaction['paymentReceiver']['id'] !!}</p>
        </div>
    </div>

</div>

<!-- Receive Amount Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('receive_amount', Lang::get('receivedTransactions/show_fields.receive_amount'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $receivedTransaction->receive_amount !!}</p>
        </div>
    </div>

</div>

<!-- Receive Date Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('receive_date', Lang::get('receivedTransactions/show_fields.receive_date'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $receivedTransaction->receive_date !!}</p>
        </div>
    </div>

</div>

<!-- Percentage Amount Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('percentage_amount', Lang::get('receivedTransactions/show_fields.percentage_amount'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $receivedTransaction->percentage_amount !!}</p>
        </div>
    </div>

</div>

