<table class="table table-bordered table-striped dataTable">
    <thead>
    <th>@lang('receivedTransactions/table.payment_user_id')</th>
			<th>@lang('receivedTransactions/table.receiver_id')</th>
			<th>@lang('receivedTransactions/table.receive_amount')</th>
			<th>@lang('receivedTransactions/table.receive_date')</th>
			<th>@lang('receivedTransactions/table.percentage_amount')</th>
    <th width="100px;">@lang('receivedTransactions/table.action')</th>
    </thead>
    <tbody>
    @foreach($receivedTransactions as $receivedTransaction)
        <tr>
            <td>{!! $receivedTransaction['paymentUser']['id'] !!}</td>
			<td>{!! $receivedTransaction['paymentReceiver']['id'] !!}</td>
			<td>{!! $receivedTransaction->receive_amount !!}</td>
			<td>{!! $receivedTransaction->receive_date !!}</td>
			<td>{!! $receivedTransaction->percentage_amount !!}</td>
            <td>
                <a href="{!! route('administration.receivedTransactions.show', [$receivedTransaction->id]) !!}"><i class="fa fa-eye"></i></a>
                <a href="{!! route('administration.receivedTransactions.edit', [$receivedTransaction->id]) !!}"><i class="fa fa-pencil"></i></a>
                <a href="{!! route('administration.receivedTransactions.delete', [$receivedTransaction->id]) !!}" onclick="return confirm('@lang('receivedTransactions/table.delete_confirm_message')')"><i class="fa fa-trash-o"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
