<!-- Staff Id Field -->
<div class="row">
	<div class="form-group{{ $errors->has('staff_id') ? ' has-error' : '' }}">
	    {!! Form::label('staff_id', Lang::get('staffReceiveTranscations/fields.staff_id'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	    	{!! Form::select('staff_id', $staff, null, ['class' => 'select2able']) !!}
	        @if ($errors->has('staff_id'))
	            <span class="help-block">
	                <strong>{{ $errors->first('staff_id') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>

<!-- Receiver Deposit Id Field -->
<div class="row">
	<div class="form-group{{ $errors->has('receiver_deposit_id') ? ' has-error' : '' }}">
	    {!! Form::label('receiver_deposit_id', Lang::get('staffReceiveTranscations/fields.receiver_deposit_id'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	    	{!! Form::select('receiver_deposit_id', $receiverDepositTransactions, null, ['class' => 'select2able']) !!}
	        @if ($errors->has('receiver_deposit_id'))
	            <span class="help-block">
	                <strong>{{ $errors->first('receiver_deposit_id') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>

<!-- Received Amount Field -->
<div class="row">
	<div class="form-group{{ $errors->has('received_amount') ? ' has-error' : '' }}">
	    {!! Form::label('received_amount', Lang::get('staffReceiveTranscations/fields.received_amount'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	        
			{!! Form::number('received_amount', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('received_amount'))
	            <span class="help-block">
	                <strong>{{ $errors->first('received_amount') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>

<!-- Received Date Field -->
<div class="row">
	<div class="form-group{{ $errors->has('received_date') ? ' has-error' : '' }}">
	    {!! Form::label('received_date', Lang::get('staffReceiveTranscations/fields.received_date'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	        <div class="input-group date datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy">
                
				{!! Form::text('received_date', null, ['class' => 'form-control']) !!}
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            </div>
	        @if ($errors->has('received_date'))
	            <span class="help-block">
	                <strong>{{ $errors->first('received_date') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>


<!-- Submit Field -->
<div class="row">
	<div class="form-group">
		<div class="col-sm-6 col-sm-offset-4 col-md-offset-4 col-lg-offset-2">
		    {!! Form::submit(Lang::get('staffReceiveTranscations/fields.save'), ['class' => 'btn btn-primary']) !!}
		    <a class="btn btn-default-outline" href="{!! route('administration.staffReceiveTranscations.index') !!}">@lang('staffReceiveTranscations/fields.cancel')</a>
	    </div>
	</div>
</div>
