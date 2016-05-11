<table class="table table-bordered table-striped dataTable">
    <thead>
    <th>@lang('paymentTranscations/table.payment_user_id')</th>
			<th>@lang('paymentTranscations/table.payment_merchant_id')</th>
			<th>@lang('paymentTranscations/table.payment_amount')</th>
			<th>@lang('paymentTranscations/table.percentage_amount')</th>
			<th>@lang('paymentTranscations/table.payment_date')</th>
    <th width="100px;">@lang('paymentTranscations/table.action')</th>
    </thead>
    <tbody>
    @foreach($paymentTranscations as $paymentTranscation)
        <tr>
            <td>{!! $paymentTranscation['paymentUser']['id'] !!}</td>
			<td>{!! $paymentTranscation['paymentMerchant']['id'] !!}</td>
			<td>{!! $paymentTranscation->payment_amount !!}</td>
			<td>{!! $paymentTranscation->percentage_amount !!}</td>
			<td>{!! $paymentTranscation->payment_date !!}</td>
            <td>
                <a href="{!! route('administration.paymentTranscations.show', [$paymentTranscation->id]) !!}"><i class="fa fa-eye"></i></a>
                <a href="{!! route('administration.paymentTranscations.edit', [$paymentTranscation->id]) !!}"><i class="fa fa-pencil"></i></a>
                <a href="{!! route('administration.paymentTranscations.delete', [$paymentTranscation->id]) !!}" onclick="return confirm('@lang('paymentTranscations/table.delete_confirm_message')')"><i class="fa fa-trash-o"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
