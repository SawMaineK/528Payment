<table class="table table-bordered table-striped dataTable">
    <thead>
    <th>@lang('paymentReceivers/table.user_id')</th>
			<th>@lang('paymentReceivers/table.total_payable_deposit')</th>
			<th>@lang('paymentReceivers/table.current_payable_deposit')</th>
			<th>@lang('paymentReceivers/table.receiver_percentage')</th>
			<th>@lang('paymentReceivers/table.total_percentage_amount')</th>
    <th width="100px;">@lang('paymentReceivers/table.action')</th>
    </thead>
    <tbody>
    @foreach($paymentReceivers as $paymentReceiver)
        <tr>
            <td>{!! $paymentReceiver['user']['name'] !!}</td>
			<td>{!! $paymentReceiver->total_payable_deposit !!}</td>
			<td>{!! $paymentReceiver->current_payable_deposit !!}</td>
			<td>{!! $paymentReceiver->receiver_percentage !!}</td>
			<td>{!! $paymentReceiver->total_percentage_amount !!}</td>
            <td>
                <a href="{!! route('administration.paymentReceivers.show', [$paymentReceiver->id]) !!}"><i class="fa fa-eye"></i></a>
                <a href="{!! route('administration.paymentReceivers.edit', [$paymentReceiver->id]) !!}"><i class="fa fa-pencil"></i></a>
                <a href="{!! route('administration.paymentReceivers.delete', [$paymentReceiver->id]) !!}" onclick="return confirm('@lang('paymentReceivers/table.delete_confirm_message')')"><i class="fa fa-trash-o"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
