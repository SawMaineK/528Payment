<!-- Staff Id Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('staff_id', Lang::get('staffReceiveTranscations/show_fields.staff_id'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $staffReceiveTranscation['staff']['id'] !!}</p>
        </div>
    </div>

</div>

<!-- Receiver Deposit Id Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('receiver_deposit_id', Lang::get('staffReceiveTranscations/show_fields.receiver_deposit_id'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $staffReceiveTranscation['receiverDepositTransaction']['id'] !!}</p>
        </div>
    </div>

</div>

<!-- Received Amount Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('received_amount', Lang::get('staffReceiveTranscations/show_fields.received_amount'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $staffReceiveTranscation->received_amount !!}</p>
        </div>
    </div>

</div>

<!-- Received Date Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('received_date', Lang::get('staffReceiveTranscations/show_fields.received_date'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $staffReceiveTranscation->received_date !!}</p>
        </div>
    </div>

</div>

