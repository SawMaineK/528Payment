<table class="table table-bordered table-striped dataTable">
    <thead>
    <th>@lang('paymentMerchants/table.user_id')</th>
			<th>@lang('paymentMerchants/table.merchant_type')</th>
			<th>@lang('paymentMerchants/table.percentage')</th>
			<th>@lang('paymentMerchants/table.total_percentage_amount')</th>
    <th width="100px;">@lang('paymentMerchants/table.action')</th>
    </thead>
    <tbody>
    @foreach($paymentMerchants as $paymentMerchant)
        <tr>
            <td>{!! $paymentMerchant['user']['name'] !!}</td>
			<td>{!! $paymentMerchant['merchantType']['name'] !!}</td>
			<td>{!! $paymentMerchant->percentage !!}</td>
			<td>{!! $paymentMerchant->total_percentage_amount !!}</td>
            <td>
                <a href="{!! route('administration.paymentMerchants.show', [$paymentMerchant->id]) !!}"><i class="fa fa-eye"></i></a>
                <a href="{!! route('administration.paymentMerchants.edit', [$paymentMerchant->id]) !!}"><i class="fa fa-pencil"></i></a>
                <a href="{!! route('administration.paymentMerchants.delete', [$paymentMerchant->id]) !!}" onclick="return confirm('@lang('paymentMerchants/table.delete_confirm_message')')"><i class="fa fa-trash-o"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
