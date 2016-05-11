<!-- Payment User Id Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('payment_user_id', Lang::get('depositTransactions/show_fields.payment_user_id'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $depositTransaction['paymentUser']['id'] !!}</p>
        </div>
    </div>

</div>

<!-- Deposit Type Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('deposit_type', Lang::get('depositTransactions/show_fields.deposit_type'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $depositTransaction->deposit_type !!}</p>
        </div>
    </div>

</div>

<!-- Deposit Amount Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('deposit_amount', Lang::get('depositTransactions/show_fields.deposit_amount'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $depositTransaction->deposit_amount !!}</p>
        </div>
    </div>

</div>

<!-- Deposit Date Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('deposit_date', Lang::get('depositTransactions/show_fields.deposit_date'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $depositTransaction->deposit_date !!}</p>
        </div>
    </div>

</div>

<!-- Deposit Code Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('deposit_code', Lang::get('depositTransactions/show_fields.deposit_code'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $depositTransaction->deposit_code !!}</p>
        </div>
    </div>

</div>

<!-- Deposit Status Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('deposit_status', Lang::get('depositTransactions/show_fields.deposit_status'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $depositTransaction->deposit_status !!}</p>
        </div>
    </div>

</div>

