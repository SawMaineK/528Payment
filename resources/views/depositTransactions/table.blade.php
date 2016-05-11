<table class="table table-bordered table-striped dataTable">
    <thead>
    <th>@lang('depositTransactions/table.payment_user_id')</th>
			<th>@lang('depositTransactions/table.deposit_type')</th>
			<th>@lang('depositTransactions/table.deposit_amount')</th>
			<th>@lang('depositTransactions/table.deposit_date')</th>
			<th>@lang('depositTransactions/table.deposit_code')</th>
			<th>@lang('depositTransactions/table.deposit_status')</th>
    <th width="100px;">@lang('depositTransactions/table.action')</th>
    </thead>
    <tbody>
    @foreach($depositTransactions as $depositTransaction)
        <tr>
            <td>{!! $depositTransaction['paymentUser']['id'] !!}</td>
			<td>{!! $depositTransaction->deposit_type !!}</td>
			<td>{!! $depositTransaction->deposit_amount !!}</td>
			<td>{!! $depositTransaction->deposit_date !!}</td>
			<td>{!! $depositTransaction->deposit_code !!}</td>
			<td>{!! $depositTransaction->deposit_status !!}</td>
            <td>
                <a href="{!! route('administration.depositTransactions.show', [$depositTransaction->id]) !!}"><i class="fa fa-eye"></i></a>
                <a href="{!! route('administration.depositTransactions.edit', [$depositTransaction->id]) !!}"><i class="fa fa-pencil"></i></a>
                <a href="{!! route('administration.depositTransactions.delete', [$depositTransaction->id]) !!}" onclick="return confirm('@lang('depositTransactions/table.delete_confirm_message')')"><i class="fa fa-trash-o"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
