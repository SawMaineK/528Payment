<!-- Receiver Id Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('receiver_id', Lang::get('receiverDepositTransactions/show_fields.receiver_id'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $receiverDepositTransaction['paymentReceiver']['id'] !!}</p>
        </div>
    </div>

</div>

<!-- Payable Deposit Amount Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('payable_deposit_amount', Lang::get('receiverDepositTransactions/show_fields.payable_deposit_amount'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $receiverDepositTransaction->payable_deposit_amount !!}</p>
        </div>
    </div>

</div>

<!-- Deposit Type Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('deposit_type', Lang::get('receiverDepositTransactions/show_fields.deposit_type'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $receiverDepositTransaction->deposit_type !!}</p>
        </div>
    </div>

</div>

<!-- Deposit Date Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('deposit_date', Lang::get('receiverDepositTransactions/show_fields.deposit_date'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $receiverDepositTransaction->deposit_date !!}</p>
        </div>
    </div>

</div>

