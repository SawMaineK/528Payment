<!-- User Id Field -->
<div class="row">
	<div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
	    {!! Form::label('user_id', Lang::get('staff/fields.user_id'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
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

<!-- Position Field -->
<div class="row">
	<div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
	    {!! Form::label('position', Lang::get('staff/fields.position'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	        
			{!! Form::text('position', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('position'))
	            <span class="help-block">
	                <strong>{{ $errors->first('position') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>


<!-- Submit Field -->
<div class="row">
	<div class="form-group">
		<div class="col-sm-6 col-sm-offset-4 col-md-offset-4 col-lg-offset-2">
		    {!! Form::submit(Lang::get('staff/fields.save'), ['class' => 'btn btn-primary']) !!}
		    <a class="btn btn-default-outline" href="{!! route('administration.staff.index') !!}">@lang('staff/fields.cancel')</a>
	    </div>
	</div>
</div>
