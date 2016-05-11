<!-- Payment User Id Field -->
<div class="row">
	<div class="form-group{{ $errors->has('payment_user_id') ? ' has-error' : '' }}">
	    {!! Form::label('payment_user_id', Lang::get('receivedTransactions/fields.payment_user_id'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
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

<!-- Receiver Id Field -->
<div class="row">
	<div class="form-group{{ $errors->has('receiver_id') ? ' has-error' : '' }}">
	    {!! Form::label('receiver_id', Lang::get('receivedTransactions/fields.receiver_id'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
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

<!-- Receive Amount Field -->
<div class="row">
	<div class="form-group{{ $errors->has('receive_amount') ? ' has-error' : '' }}">
	    {!! Form::label('receive_amount', Lang::get('receivedTransactions/fields.receive_amount'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	        
			{!! Form::number('receive_amount', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('receive_amount'))
	            <span class="help-block">
	                <strong>{{ $errors->first('receive_amount') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>

<!-- Receive Date Field -->
<div class="row">
	<div class="form-group{{ $errors->has('receive_date') ? ' has-error' : '' }}">
	    {!! Form::label('receive_date', Lang::get('receivedTransactions/fields.receive_date'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	        <div class="input-group date datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy">
                
				{!! Form::text('receive_date', null, ['class' => 'form-control']) !!}
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            </div>
	        @if ($errors->has('receive_date'))
	            <span class="help-block">
	                <strong>{{ $errors->first('receive_date') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>

<!-- Percentage Amount Field -->
<div class="row">
	<div class="form-group{{ $errors->has('percentage_amount') ? ' has-error' : '' }}">
	    {!! Form::label('percentage_amount', Lang::get('receivedTransactions/fields.percentage_amount'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
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


<!-- Submit Field -->
<div class="row">
	<div class="form-group">
		<div class="col-sm-6 col-sm-offset-4 col-md-offset-4 col-lg-offset-2">
		    {!! Form::submit(Lang::get('receivedTransactions/fields.save'), ['class' => 'btn btn-primary']) !!}
		    <a class="btn btn-default-outline" href="{!! route('administration.receivedTransactions.index') !!}">@lang('receivedTransactions/fields.cancel')</a>
	    </div>
	</div>
</div>
