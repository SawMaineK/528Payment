<!-- Payment User Id Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('payment_user_id', Lang::get('paymentTranscations/show_fields.payment_user_id'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $paymentTranscation['paymentUser']['id'] !!}</p>
        </div>
    </div>

</div>

<!-- Payment Merchant Id Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('payment_merchant_id', Lang::get('paymentTranscations/show_fields.payment_merchant_id'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $paymentTranscation['paymentMerchant']['id'] !!}</p>
        </div>
    </div>

</div>

<!-- Payment Amount Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('payment_amount', Lang::get('paymentTranscations/show_fields.payment_amount'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $paymentTranscation->payment_amount !!}</p>
        </div>
    </div>

</div>

<!-- Percentage Amount Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('percentage_amount', Lang::get('paymentTranscations/show_fields.percentage_amount'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $paymentTranscation->percentage_amount !!}</p>
        </div>
    </div>

</div>

<!-- Payment Date Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('payment_date', Lang::get('paymentTranscations/show_fields.payment_date'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $paymentTranscation->payment_date !!}</p>
        </div>
    </div>

</div>

