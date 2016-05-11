@extends('layouts.admin')

@section('content')
<div class="container">

	<h1>
        @lang('paymentReceivers/edit.edit_model')
    </h1>

    @include('common.errors')

    <div class="widget-container fluid-height clearfix">
        <div class="heading">
            <i class="fa fa-th-list"></i>@lang('paymentReceivers/edit.edit_model')
        </div>
        <div class="clearfix">

		    {!! Form::model($paymentReceiver, ['route' => ['administration.paymentReceivers.update', $paymentReceiver->id], 'enctype'=>'multipart/form-data', 'method' => 'patch', 'class'=>'form-horizontal', 'role'=>'form']) !!}

		        @include('paymentReceivers.fields')

		    {!! Form::close() !!}
		    
		</div>
	</div>
</div>
@endsection
