<!-- Payment User Id Field -->
<div class="row">
	<div class="form-group{{ $errors->has('payment_user_id') ? ' has-error' : '' }}">
	    {!! Form::label('payment_user_id', Lang::get('paymentTranscations/fields.payment_user_id'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
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

<!-- Payment Merchant Id Field -->
<div class="row">
	<div class="form-group{{ $errors->has('payment_merchant_id') ? ' has-error' : '' }}">
	    {!! Form::label('payment_merchant_id', Lang::get('paymentTranscations/fields.payment_merchant_id'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	    	{!! Form::select('payment_merchant_id', $paymentMerchants, null, ['class' => 'select2able']) !!}
	        @if ($errors->has('payment_merchant_id'))
	            <span class="help-block">
	                <strong>{{ $errors->first('payment_merchant_id') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>

<!-- Payment Amount Field -->
<div class="row">
	<div class="form-group{{ $errors->has('payment_amount') ? ' has-error' : '' }}">
	    {!! Form::label('payment_amount', Lang::get('paymentTranscations/fields.payment_amount'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	        
			{!! Form::number('payment_amount', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('payment_amount'))
	            <span class="help-block">
	                <strong>{{ $errors->first('payment_amount') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>

<!-- Percentage Amount Field -->
<div class="row">
	<div class="form-group{{ $errors->has('percentage_amount') ? ' has-error' : '' }}">
	    {!! Form::label('percentage_amount', Lang::get('paymentTranscations/fields.percentage_amount'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	        
			{!! Form::number('percentage_amount', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('percentage_amount'))
	            <span class="help-block">
	                <strong>{{ $errors->first('percentage_amount') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>

<!-- Payment Date Field -->
<div class="row">
	<div class="form-group{{ $errors->has('payment_date') ? ' has-error' : '' }}">
	    {!! Form::label('payment_date', Lang::get('paymentTranscations/fields.payment_date'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	        <div class="input-group date datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy">
                
				{!! Form::text('payment_date', null, ['class' => 'form-control']) !!}
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            </div>
	        @if ($errors->has('payment_date'))
	            <span class="help-block">
	                <strong>{{ $errors->first('payment_date') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>


<!-- Submit Field -->
<div class="row">
	<div class="form-group">
		<div class="col-sm-6 col-sm-offset-4 col-md-offset-4 col-lg-offset-2">
		    {!! Form::submit(Lang::get('paymentTranscations/fields.save'), ['class' => 'btn btn-primary']) !!}
		    <a class="btn btn-default-outline" href="{!! route('administration.paymentTranscations.index') !!}">@lang('paymentTranscations/fields.cancel')</a>
	    </div>
	</div>
</div>
