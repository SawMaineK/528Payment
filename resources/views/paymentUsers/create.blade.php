@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>
        @lang('paymentUsers/create.new_model')
    </h1>
    @include('common.errors')
    <div class="widget-container fluid-height clearfix">
        <div class="heading">
            <i class="fa fa-th-list"></i>@lang('paymentUsers/create.new_model')
        </div>
        <div class="clearfix">
		    {!! Form::open(['route' => 'administration.paymentUsers.store', 'enctype'=>'multipart/form-data', 'class'=>'form-horizontal', 'role'=>'form']) !!}

		        @include('paymentUsers.fields')

		    {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

