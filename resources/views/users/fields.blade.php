<!-- Name Field -->
<div class="row">
	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	    {!! Form::label('name', Lang::get('users/fields.name'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	        
			{!! Form::select('name', [ '' => '' ], null, ['class' => 'select2able']) !!}
	        @if ($errors->has('name'))
	            <span class="help-block">
	                <strong>{{ $errors->first('name') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>

<!-- Email Field -->
<div class="row">
	<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	    {!! Form::label('email', Lang::get('users/fields.email'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	        
			{!! Form::email('email', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('email'))
	            <span class="help-block">
	                <strong>{{ $errors->first('email') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>

<!-- Password Field -->
<div class="row">
	<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	    {!! Form::label('password', Lang::get('users/fields.password'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	        
			{!! Form::password('password', ['class' => 'form-control']) !!}
	        @if ($errors->has('password'))
	            <span class="help-block">
	                <strong>{{ $errors->first('password') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>

<!-- Phone Field -->
<div class="row">
	<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
	    {!! Form::label('phone', Lang::get('users/fields.phone'),['class' => 'col-sm-4 col-lg-2 control-label']) !!}
	    <div class="col-sm-6 col-lg-6"> 
	        
			{!! Form::text('phone', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('phone'))
	            <span class="help-block">
	                <strong>{{ $errors->first('phone') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

</div>


<!-- Submit Field -->
<div class="row">
	<div class="form-group">
		<div class="col-sm-6 col-sm-offset-4 col-md-offset-4 col-lg-offset-2">
		    {!! Form::submit(Lang::get('users/fields.save'), ['class' => 'btn btn-primary']) !!}
		    <a class="btn btn-default-outline" href="{!! route('administration.users.index') !!}">@lang('users/fields.cancel')</a>
	    </div>
	</div>
</div>
