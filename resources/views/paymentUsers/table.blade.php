<table class="table table-bordered table-striped dataTable">
    <thead>
    <th>@lang('paymentUsers/table.user_id')</th>
			<th>@lang('paymentUsers/table.total_deposit')</th>
			<th>@lang('paymentUsers/table.remaining_deposit')</th>
    <th width="100px;">@lang('paymentUsers/table.action')</th>
    </thead>
    <tbody>
    @foreach($paymentUsers as $paymentUser)
        <tr>
            <td>{!! $paymentUser['user']['name'] !!}</td>
			<td>{!! $paymentUser->total_deposit !!}</td>
			<td>{!! $paymentUser->remaining_deposit !!}</td>
            <td>
                <a href="{!! route('administration.paymentUsers.show', [$paymentUser->id]) !!}"><i class="fa fa-eye"></i></a>
                <a href="{!! route('administration.paymentUsers.edit', [$paymentUser->id]) !!}"><i class="fa fa-pencil"></i></a>
                <a href="{!! route('administration.paymentUsers.delete', [$paymentUser->id]) !!}" onclick="return confirm('@lang('paymentUsers/table.delete_confirm_message')')"><i class="fa fa-trash-o"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
