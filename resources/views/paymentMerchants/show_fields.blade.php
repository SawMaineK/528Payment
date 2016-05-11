<!-- User Id Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('user_id', Lang::get('paymentMerchants/show_fields.user_id'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $paymentMerchant['user']['name'] !!}</p>
        </div>
    </div>

</div>

<!-- Merchant Type Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('merchant_type', Lang::get('paymentMerchants/show_fields.merchant_type'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $paymentMerchant['merchantType']['name'] !!}</p>
        </div>
    </div>

</div>

<!-- Percentage Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('percentage', Lang::get('paymentMerchants/show_fields.percentage'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $paymentMerchant->percentage !!}</p>
        </div>
    </div>

</div>

<!-- Total Percentage Amount Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('total_percentage_amount', Lang::get('paymentMerchants/show_fields.total_percentage_amount'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $paymentMerchant->total_percentage_amount !!}</p>
        </div>
    </div>

</div>

