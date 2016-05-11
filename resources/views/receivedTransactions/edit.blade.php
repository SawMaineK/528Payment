@extends('layouts.admin')

@section('content')
<div class="container">

	<h1>
        @lang('receivedTransactions/edit.edit_model')
    </h1>

    @include('common.errors')

    <div class="widget-container fluid-height clearfix">
        <div class="heading">
            <i class="fa fa-th-list"></i>@lang('receivedTransactions/edit.edit_model')
        </div>
        <div class="clearfix">

		    {!! Form::model($receivedTransaction, ['route' => ['administration.receivedTransactions.update', $receivedTransaction->id], 'enctype'=>'multipart/form-data', 'method' => 'patch', 'class'=>'form-horizontal', 'role'=>'form']) !!}

		        @include('receivedTransactions.fields')

		    {!! Form::close() !!}
		    
		</div>
	</div>
</div>
@endsection
