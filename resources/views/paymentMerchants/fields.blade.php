<!-- User Id Field -->
<div class="row">
	<div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
	    {!! Form::label('user_id', Lang::get('paymentMerchants/fields.user_id'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	    	{!! Form::select('user_id', $users, null, ['class' => 'select2able']) !!}
	        @if ($errors->has('user_id'))
	            <span class="help-block">
	                <strong>{{ $errors->first('user_id') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>

<!-- Merchant Type Field -->
<div class="row">
	<div class="form-group{{ $errors->has('merchant_type') ? ' has-error' : '' }}">
	    {!! Form::label('merchant_type', Lang::get('paymentMerchants/fields.merchant_type'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	    	{!! Form::select('merchant_type', $merchantTypes, null, ['class' => 'select2able']) !!}
	        @if ($errors->has('merchant_type'))
	            <span class="help-block">
	                <strong>{{ $errors->first('merchant_type') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>

<!-- Percentage Field -->
<div class="row">
	<div class="form-group{{ $errors->has('percentage') ? ' has-error' : '' }}">
	    {!! Form::label('percentage', Lang::get('paymentMerchants/fields.percentage'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	        
			{!! Form::number('percentage', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('percentage'))
	            <span class="help-block">
	                <strong>{{ $errors->first('percentage') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>

<!-- Total Percentage Amount Field -->
<div class="row">
	<div class="form-group{{ $errors->has('total_percentage_amount') ? ' has-error' : '' }}">
	    {!! Form::label('total_percentage_amount', Lang::get('paymentMerchants/fields.total_percentage_amount'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	        
			{!! Form::number('total_percentage_amount', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('total_percentage_amount'))
	            <span class="help-block">
	                <strong>{{ $errors->first('total_percentage_amount') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>


<!-- Submit Field -->
<div class="row">
	<div class="form-group">
		<div class="col-sm-6 col-sm-offset-4 col-md-offset-4 col-lg-offset-2">
		    {!! Form::submit(Lang::get('paymentMerchants/fields.save'), ['class' => 'btn btn-primary']) !!}
		    <a class="btn btn-default-outline" href="{!! route('administration.paymentMerchants.index') !!}">@lang('paymentMerchants/fields.cancel')</a>
	    </div>
	</div>
</div>
