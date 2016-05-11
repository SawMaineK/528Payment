@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>
         @lang('paymentTranscations/show.model_detail')
    </h1>
    <div class="widget-container fluid-height clearfix">
        <div class="heading">
            <i class="fa fa-th-list"></i>@lang('paymentTranscations/show.model_detail')
        </div>
        <div class="clearfix">
		    @include('paymentTranscations.show_fields')
            <br><br>
        </div>
    </div>
</div>
@endsection


