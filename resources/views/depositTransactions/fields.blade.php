<!-- Payment User Id Field -->
<div class="row">
	<div class="form-group{{ $errors->has('payment_user_id') ? ' has-error' : '' }}">
	    {!! Form::label('payment_user_id', Lang::get('depositTransactions/fields.payment_user_id'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	    	{!! Form::select('payment_user_id', $paymentUsers, null, ['class' => 'select2able']) !!}
	        @if ($errors->has('payment_user_id'))
	            <span class="help-block">
	                <strong>{{ $errors->first('payment_user_id') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>

<!-- Deposit Type Field -->
<div class="row">
	<div class="form-group{{ $errors->has('deposit_type') ? ' has-error' : '' }}">
	    {!! Form::label('deposit_type', Lang::get('depositTransactions/fields.deposit_type'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	        
			{!! Form::select('deposit_type', [ 'MPU Payment' => 'MPU Payment', 'Receive Client' => 'Receive Client' ], null, ['class' => 'select2able']) !!}
	        @if ($errors->has('deposit_type'))
	            <span class="help-block">
	                <strong>{{ $errors->first('deposit_type') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>

<!-- Deposit Amount Field -->
<div class="row">
	<div class="form-group{{ $errors->has('deposit_amount') ? ' has-error' : '' }}">
	    {!! Form::label('deposit_amount', Lang::get('depositTransactions/fields.deposit_amount'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	        
			{!! Form::number('deposit_amount', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('deposit_amount'))
	            <span class="help-block">
	                <strong>{{ $errors->first('deposit_amount') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>

<!-- Deposit Date Field -->
<div class="row">
	<div class="form-group{{ $errors->has('deposit_date') ? ' has-error' : '' }}">
	    {!! Form::label('deposit_date', Lang::get('depositTransactions/fields.deposit_date'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
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

<!-- Deposit Code Field -->
<div class="row">
	<div class="form-group{{ $errors->has('deposit_code') ? ' has-error' : '' }}">
	    {!! Form::label('deposit_code', Lang::get('depositTransactions/fields.deposit_code'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	        
			{!! Form::text('deposit_code', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('deposit_code'))
	            <span class="help-block">
	                <strong>{{ $errors->first('deposit_code') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>

<!-- Deposit Status Field -->
<div class="row">
	<div class="form-group{{ $errors->has('deposit_status') ? ' has-error' : '' }}">
	    {!! Form::label('deposit_status', Lang::get('depositTransactions/fields.deposit_status'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	        
			{!! Form::select('deposit_status', [ 'Pendding' => 'Pendding', 'Complete' => 'Complete' ], null, ['class' => 'select2able']) !!}
	        @if ($errors->has('deposit_status'))
	            <span class="help-block">
	                <strong>{{ $errors->first('deposit_status') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>


<!-- Submit Field -->
<div class="row">
	<div class="form-group">
		<div class="col-sm-6 col-sm-offset-4 col-md-offset-4 col-lg-offset-2">
		    {!! Form::submit(Lang::get('depositTransactions/fields.save'), ['class' => 'btn btn-primary']) !!}
		    <a class="btn btn-default-outline" href="{!! route('administration.depositTransactions.index') !!}">@lang('depositTransactions/fields.cancel')</a>
	    </div>
	</div>
</div>
