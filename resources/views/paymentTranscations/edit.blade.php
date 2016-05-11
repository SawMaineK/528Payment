@extends('layouts.admin')

@section('content')
<div class="container">

	<h1>
        @lang('paymentTranscations/edit.edit_model')
    </h1>

    @include('common.errors')

    <div class="widget-container fluid-height clearfix">
        <div class="heading">
            <i class="fa fa-th-list"></i>@lang('paymentTranscations/edit.edit_model')
        </div>
        <div class="clearfix">

		    {!! Form::model($paymentTranscation, ['route' => ['administration.paymentTranscations.update', $paymentTranscation->id], 'enctype'=>'multipart/form-data', 'method' => 'patch', 'class'=>'form-horizontal', 'role'=>'form']) !!}

		        @include('paymentTranscations.fields')

		    {!! Form::close() !!}
		    
		</div>
	</div>
</div>
@endsection
