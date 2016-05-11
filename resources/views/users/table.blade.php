<table class="table table-bordered table-striped dataTable">
    <thead>
    <th>@lang('users/table.name')</th>
			<th>@lang('users/table.email')</th>
			<th>@lang('users/table.password')</th>
			<th>@lang('users/table.phone')</th>
    <th width="100px;">@lang('users/table.action')</th>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{!! $user->name !!}</td>
			<td>{!! $user->email !!}</td>
			<td>{!! $user->password !!}</td>
			<td>{!! $user->phone !!}</td>
            <td>
                <a href="{!! route('administration.users.show', [$user->id]) !!}"><i class="fa fa-eye"></i></a>
                <a href="{!! route('administration.users.edit', [$user->id]) !!}"><i class="fa fa-pencil"></i></a>
                <a href="{!! route('administration.users.delete', [$user->id]) !!}" onclick="return confirm('@lang('users/table.delete_confirm_message')')"><i class="fa fa-trash-o"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
