<table class="table table-bordered table-striped dataTable">
    <thead>
    <th>@lang('mPUPaymentTransactions/table.payment_user_id')</th>
			<th>@lang('mPUPaymentTransactions/table.receiver_id')</th>
			<th>@lang('mPUPaymentTransactions/table.payment_amount')</th>
			<th>@lang('mPUPaymentTransactions/table.payment_status')</th>
			<th>@lang('mPUPaymentTransactions/table.payment_date')</th>
    <th width="100px;">@lang('mPUPaymentTransactions/table.action')</th>
    </thead>
    <tbody>
    @foreach($mPUPaymentTransactions as $mPUPaymentTransaction)
        <tr>
            <td>{!! $mPUPaymentTransaction['paymentUser']['id'] !!}</td>
			<td>{!! $mPUPaymentTransaction['paymentReceiver']['id'] !!}</td>
			<td>{!! $mPUPaymentTransaction->payment_amount !!}</td>
			<td>{!! $mPUPaymentTransaction->payment_status !!}</td>
			<td>{!! $mPUPaymentTransaction->payment_date !!}</td>
            <td>
                <a href="{!! route('administration.mPUPaymentTransactions.show', [$mPUPaymentTransaction->id]) !!}"><i class="fa fa-eye"></i></a>
                <a href="{!! route('administration.mPUPaymentTransactions.edit', [$mPUPaymentTransaction->id]) !!}"><i class="fa fa-pencil"></i></a>
                <a href="{!! route('administration.mPUPaymentTransactions.delete', [$mPUPaymentTransaction->id]) !!}" onclick="return confirm('@lang('mPUPaymentTransactions/table.delete_confirm_message')')"><i class="fa fa-trash-o"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
