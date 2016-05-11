<table class="table table-bordered table-striped dataTable">
    <thead>
    <th>@lang('receiverDepositTransactions/table.receiver_id')</th>
			<th>@lang('receiverDepositTransactions/table.payable_deposit_amount')</th>
			<th>@lang('receiverDepositTransactions/table.deposit_type')</th>
			<th>@lang('receiverDepositTransactions/table.deposit_date')</th>
    <th width="100px;">@lang('receiverDepositTransactions/table.action')</th>
    </thead>
    <tbody>
    @foreach($receiverDepositTransactions as $receiverDepositTransaction)
        <tr>
            <td>{!! $receiverDepositTransaction['paymentReceiver']['id'] !!}</td>
			<td>{!! $receiverDepositTransaction->payable_deposit_amount !!}</td>
			<td>{!! $receiverDepositTransaction->deposit_type !!}</td>
			<td>{!! $receiverDepositTransaction->deposit_date !!}</td>
            <td>
                <a href="{!! route('administration.receiverDepositTransactions.show', [$receiverDepositTransaction->id]) !!}"><i class="fa fa-eye"></i></a>
                <a href="{!! route('administration.receiverDepositTransactions.edit', [$receiverDepositTransaction->id]) !!}"><i class="fa fa-pencil"></i></a>
                <a href="{!! route('administration.receiverDepositTransactions.delete', [$receiverDepositTransaction->id]) !!}" onclick="return confirm('@lang('receiverDepositTransactions/table.delete_confirm_message')')"><i class="fa fa-trash-o"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
