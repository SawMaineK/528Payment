<!-- Name Field -->
<div class="row">
    <div class="form-group">
        {!! Form::label('name', Lang::get('merchantTypes/show_fields.name'), ['class' => 'col-sm-4 col-lg-2 control-label']) !!}
        <div class="col-sm-6 col-lg-6">
            <p>{!! $merchantType->name !!}</p>
        </div>
    </div>

</div>

