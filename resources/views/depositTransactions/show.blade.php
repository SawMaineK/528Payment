@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>
         @lang('depositTransactions/show.model_detail')
    </h1>
    <div class="widget-container fluid-height clearfix">
        <div class="heading">
            <i class="fa fa-th-list"></i>@lang('depositTransactions/show.model_detail')
        </div>
        <div class="clearfix">
		    @include('depositTransactions.show_fields')
            <br><br>
        </div>
    </div>
</div>
@endsection


