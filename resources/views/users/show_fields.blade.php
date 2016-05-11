<!-- Name Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('name', Lang::get('users/show_fields.name'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $user->name !!}</p>
        </div>
    </div>

</div>

<!-- Email Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('email', Lang::get('users/show_fields.email'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $user->email !!}</p>
        </div>
    </div>

</div>

<!-- Password Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('password', Lang::get('users/show_fields.password'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $user->password !!}</p>
        </div>
    </div>

</div>

<!-- Phone Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('phone', Lang::get('users/show_fields.phone'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $user->phone !!}</p>
        </div>
    </div>

</div>

