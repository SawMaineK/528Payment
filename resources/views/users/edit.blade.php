@extends('layouts.admin')

@section('content')
<div class="container">

	<h1>
        @lang('users/edit.edit_model')
    </h1>

    @include('common.errors')

    <div class="widget-container fluid-height clearfix">
        <div class="heading">
            <i class="fa fa-th-list"></i>@lang('users/edit.edit_model')
        </div>
        <div class="clearfix">

		    {!! Form::model($user, ['route' => ['administration.users.update', $user->id], 'enctype'=>'multipart/form-data', 'method' => 'patch', 'class'=>'form-horizontal', 'role'=>'form']) !!}

		        @include('users.fields')

		    {!! Form::close() !!}
		    
		</div>
	</div>
</div>
@endsection
