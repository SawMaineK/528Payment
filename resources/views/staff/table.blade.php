<table class="table table-bordered table-striped dataTable">
    <thead>
    <th>@lang('staff/table.user_id')</th>
			<th>@lang('staff/table.position')</th>
    <th width="100px;">@lang('staff/table.action')</th>
    </thead>
    <tbody>
    @foreach($staff as $staff)
        <tr>
            <td>{!! $staff['user']['name'] !!}</td>
			<td>{!! $staff->position !!}</td>
            <td>
                <a href="{!! route('administration.staff.show', [$staff->id]) !!}"><i class="fa fa-eye"></i></a>
                <a href="{!! route('administration.staff.edit', [$staff->id]) !!}"><i class="fa fa-pencil"></i></a>
                <a href="{!! route('administration.staff.delete', [$staff->id]) !!}" onclick="return confirm('@lang('staff/table.delete_confirm_message')')"><i class="fa fa-trash-o"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
