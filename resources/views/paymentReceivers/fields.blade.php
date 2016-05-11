<!-- User Id Field -->
<div class="row">
	<div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
	    {!! Form::label('user_id', Lang::get('paymentReceivers/fields.user_id'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
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

<!-- Total Payable Deposit Field -->
<div class="row">
	<div class="form-group{{ $errors->has('total_payable_deposit') ? ' has-error' : '' }}">
	    {!! Form::label('total_payable_deposit', Lang::get('paymentReceivers/fields.total_payable_deposit'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	        
			{!! Form::number('total_payable_deposit', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('total_payable_deposit'))
	            <span class="help-block">
	                <strong>{{ $errors->first('total_payable_deposit') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>

<!-- Current Payable Deposit Field -->
<div class="row">
	<div class="form-group{{ $errors->has('current_payable_deposit') ? ' has-error' : '' }}">
	    {!! Form::label('current_payable_deposit', Lang::get('paymentReceivers/fields.current_payable_deposit'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	        
			{!! Form::number('current_payable_deposit', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('current_payable_deposit'))
	            <span class="help-block">
	                <strong>{{ $errors->first('current_payable_deposit') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>

<!-- Receiver Percentage Field -->
<div class="row">
	<div class="form-group{{ $errors->has('receiver_percentage') ? ' has-error' : '' }}">
	    {!! Form::label('receiver_percentage', Lang::get('paymentReceivers/fields.receiver_percentage'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	        
			{!! Form::number('receiver_percentage', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('receiver_percentage'))
	            <span class="help-block">
	                <strong>{{ $errors->first('receiver_percentage') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>

<!-- Total Percentage Amount Field -->
<div class="row">
	<div class="form-group{{ $errors->has('total_percentage_amount') ? ' has-error' : '' }}">
	    {!! Form::label('total_percentage_amount', Lang::get('paymentReceivers/fields.total_percentage_amount'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
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
		    {!! Form::submit(Lang::get('paymentReceivers/fields.save'), ['class' => 'btn btn-primary']) !!}
		    <a class="btn btn-default-outline" href="{!! route('administration.paymentReceivers.index') !!}">@lang('paymentReceivers/fields.cancel')</a>
	    </div>
	</div>
</div>
