@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>
        @lang('paymentTranscations/create.new_model')
    </h1>
    @include('common.errors')
    <div class="widget-container fluid-height clearfix">
        <div class="heading">
            <i class="fa fa-th-list"></i>@lang('paymentTranscations/create.new_model')
        </div>
        <div class="clearfix">
		    {!! Form::open(['route' => 'administration.paymentTranscations.store', 'enctype'=>'multipart/form-data', 'class'=>'form-horizontal', 'role'=>'form']) !!}

		        @include('paymentTranscations.fields')

		    {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

