@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>
        @lang('mPUPaymentTransactions/create.new_model')
    </h1>
    @include('common.errors')
    <div class="widget-container fluid-height clearfix">
        <div class="heading">
            <i class="fa fa-th-list"></i>@lang('mPUPaymentTransactions/create.new_model')
        </div>
        <div class="clearfix">
		    {!! Form::open(['route' => 'administration.mPUPaymentTransactions.store', 'enctype'=>'multipart/form-data', 'class'=>'form-horizontal', 'role'=>'form']) !!}

		        @include('mPUPaymentTransactions.fields')

		    {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

