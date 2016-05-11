<!-- User Id Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('user_id', Lang::get('paymentReceivers/show_fields.user_id'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $paymentReceiver['user']['name'] !!}</p>
        </div>
    </div>

</div>

<!-- Total Payable Deposit Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('total_payable_deposit', Lang::get('paymentReceivers/show_fields.total_payable_deposit'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $paymentReceiver->total_payable_deposit !!}</p>
        </div>
    </div>

</div>

<!-- Current Payable Deposit Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('current_payable_deposit', Lang::get('paymentReceivers/show_fields.current_payable_deposit'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $paymentReceiver->current_payable_deposit !!}</p>
        </div>
    </div>

</div>

<!-- Receiver Percentage Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('receiver_percentage', Lang::get('paymentReceivers/show_fields.receiver_percentage'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $paymentReceiver->receiver_percentage !!}</p>
        </div>
    </div>

</div>

<!-- Total Percentage Amount Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('total_percentage_amount', Lang::get('paymentReceivers/show_fields.total_percentage_amount'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $paymentReceiver->total_percentage_amount !!}</p>
        </div>
    </div>

</div>

