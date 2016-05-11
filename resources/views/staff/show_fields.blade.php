<!-- User Id Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('user_id', Lang::get('staff/show_fields.user_id'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $staff['user']['name'] !!}</p>
        </div>
    </div>

</div>

<!-- Position Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('position', Lang::get('staff/show_fields.position'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $staff->position !!}</p>
        </div>
    </div>

</div>

