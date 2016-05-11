<!-- Payment User Id Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('payment_user_id', Lang::get('mPUPaymentTransactions/show_fields.payment_user_id'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $mPUPaymentTransaction['paymentUser']['id'] !!}</p>
        </div>
    </div>

</div>

<!-- Receiver Id Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('receiver_id', Lang::get('mPUPaymentTransactions/show_fields.receiver_id'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $mPUPaymentTransaction['paymentReceiver']['id'] !!}</p>
        </div>
    </div>

</div>

<!-- Payment Amount Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('payment_amount', Lang::get('mPUPaymentTransactions/show_fields.payment_amount'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $mPUPaymentTransaction->payment_amount !!}</p>
        </div>
    </div>

</div>

<!-- Payment Status Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('payment_status', Lang::get('mPUPaymentTransactions/show_fields.payment_status'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $mPUPaymentTransaction->payment_status !!}</p>
        </div>
    </div>

</div>

<!-- Payment Date Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('payment_date', Lang::get('mPUPaymentTransactions/show_fields.payment_date'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $mPUPaymentTransaction->payment_date !!}</p>
        </div>
    </div>

</div>

