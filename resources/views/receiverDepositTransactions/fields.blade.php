<!-- Receiver Id Field -->
<div class="row">
	<div class="form-group{{ $errors->has('receiver_id') ? ' has-error' : '' }}">
	    {!! Form::label('receiver_id', Lang::get('receiverDepositTransactions/fields.receiver_id'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	    	{!! Form::select('receiver_id', $paymentReceivers, null, ['class' => 'select2able']) !!}
	        @if ($errors->has('receiver_id'))
	            <span class="help-block">
	                <strong>{{ $errors->first('receiver_id') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>

<!-- Payable Deposit Amount Field -->
<div class="row">
	<div class="form-group{{ $errors->has('payable_deposit_amount') ? ' has-error' : '' }}">
	    {!! Form::label('payable_deposit_amount', Lang::get('receiverDepositTransactions/fields.payable_deposit_amount'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	        
			{!! Form::number('payable_deposit_amount', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('payable_deposit_amount'))
	            <span class="help-block">
	                <strong>{{ $errors->first('payable_deposit_amount') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>

<!-- Deposit Type Field -->
<div class="row">
	<div class="form-group{{ $errors->has('deposit_type') ? ' has-error' : '' }}">
	    {!! Form::label('deposit_type', Lang::get('receiverDepositTransactions/fields.deposit_type'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	        
			{!! Form::select('deposit_type', [ 'MPU Payment' => 'MPU Payment', '528 Staff' => '528 Staff' ], null, ['class' => 'select2able']) !!}
	        @if ($errors->has('deposit_type'))
	            <span class="help-block">
	                <strong>{{ $errors->first('deposit_type') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>

<!-- Deposit Date Field -->
<div class="row">
	<div class="form-group{{ $errors->has('deposit_date') ? ' has-error' : '' }}">
	    {!! Form::label('deposit_date', Lang::get('receiverDepositTransactions/fields.deposit_date'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	        <div class="input-group date datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy">
                
				{!! Form::text('deposit_date', null, ['class' => 'form-control']) !!}
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            </div>
	        @if ($errors->has('deposit_date'))
	            <span class="help-block">
	                <strong>{{ $errors->first('deposit_date') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>


<!-- Submit Field -->
<div class="row">
	<div class="form-group">
		<div class="col-sm-6 col-sm-offset-4 col-md-offset-4 col-lg-offset-2">
		    {!! Form::submit(Lang::get('receiverDepositTransactions/fields.save'), ['class' => 'btn btn-primary']) !!}
		    <a class="btn btn-default-outline" href="{!! route('administration.receiverDepositTransactions.index') !!}">@lang('receiverDepositTransactions/fields.cancel')</a>
	    </div>
	</div>
</div>
