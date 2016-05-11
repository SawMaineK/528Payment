<table class="table table-bordered table-striped dataTable">
    <thead>
    <th>@lang('staffReceiveTranscations/table.staff_id')</th>
			<th>@lang('staffReceiveTranscations/table.receiver_deposit_id')</th>
			<th>@lang('staffReceiveTranscations/table.received_amount')</th>
			<th>@lang('staffReceiveTranscations/table.received_date')</th>
    <th width="100px;">@lang('staffReceiveTranscations/table.action')</th>
    </thead>
    <tbody>
    @foreach($staffReceiveTranscations as $staffReceiveTranscation)
        <tr>
            <td>{!! $staffReceiveTranscation['staff']['id'] !!}</td>
			<td>{!! $staffReceiveTranscation['receiverDepositTransaction']['id'] !!}</td>
			<td>{!! $staffReceiveTranscation->received_amount !!}</td>
			<td>{!! $staffReceiveTranscation->received_date !!}</td>
            <td>
                <a href="{!! route('administration.staffReceiveTranscations.show', [$staffReceiveTranscation->id]) !!}"><i class="fa fa-eye"></i></a>
                <a href="{!! route('administration.staffReceiveTranscations.edit', [$staffReceiveTranscation->id]) !!}"><i class="fa fa-pencil"></i></a>
                <a href="{!! route('administration.staffReceiveTranscations.delete', [$staffReceiveTranscation->id]) !!}" onclick="return confirm('@lang('staffReceiveTranscations/table.delete_confirm_message')')"><i class="fa fa-trash-o"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
