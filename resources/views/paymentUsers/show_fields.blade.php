<!-- User Id Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('user_id', Lang::get('paymentUsers/show_fields.user_id'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $paymentUser['user']['name'] !!}</p>
        </div>
    </div>

</div>

<!-- Total Deposit Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('total_deposit', Lang::get('paymentUsers/show_fields.total_deposit'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $paymentUser->total_deposit !!}</p>
        </div>
    </div>

</div>

<!-- Remaining Deposit Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('remaining_deposit', Lang::get('paymentUsers/show_fields.remaining_deposit'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $paymentUser->remaining_deposit !!}</p>
        </div>
    </div>

</div>

