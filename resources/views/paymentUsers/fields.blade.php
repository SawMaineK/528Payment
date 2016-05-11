<!-- User Id Field -->
<div class="row">
	<div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
	    {!! Form::label('user_id', Lang::get('paymentUsers/fields.user_id'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
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

<!-- Total Deposit Field -->
<div class="row">
	<div class="form-group{{ $errors->has('total_deposit') ? ' has-error' : '' }}">
	    {!! Form::label('total_deposit', Lang::get('paymentUsers/fields.total_deposit'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	        
			{!! Form::number('total_deposit', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('total_deposit'))
	            <span class="help-block">
	                <strong>{{ $errors->first('total_deposit') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>

<!-- Remaining Deposit Field -->
<div class="row">
	<div class="form-group{{ $errors->has('remaining_deposit') ? ' has-error' : '' }}">
	    {!! Form::label('remaining_deposit', Lang::get('paymentUsers/fields.remaining_deposit'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	        
			{!! Form::number('remaining_deposit', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('remaining_deposit'))
	            <span class="help-block">
	                <strong>{{ $errors->first('remaining_deposit') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>


<!-- Submit Field -->
<div class="row">
	<div class="form-group">
		<div class="col-sm-6 col-sm-offset-4 col-md-offset-4 col-lg-offset-2">
		    {!! Form::submit(Lang::get('paymentUsers/fields.save'), ['class' => 'btn btn-primary']) !!}
		    <a class="btn btn-default-outline" href="{!! route('administration.paymentUsers.index') !!}">@lang('paymentUsers/fields.cancel')</a>
	    </div>
	</div>
</div>
