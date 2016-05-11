<table class="table table-bordered table-striped dataTable">
    <thead>
    <th>@lang('merchantTypes/table.name')</th>
    <th width="100px;">@lang('merchantTypes/table.action')</th>
    </thead>
    <tbody>
    @foreach($merchantTypes as $merchantType)
        <tr>
            <td>{!! $merchantType->name !!}</td>
            <td>
                <a href="{!! route('administration.merchantTypes.show', [$merchantType->id]) !!}"><i class="fa fa-eye"></i></a>
                <a href="{!! route('administration.merchantTypes.edit', [$merchantType->id]) !!}"><i class="fa fa-pencil"></i></a>
                <a href="{!! route('administration.merchantTypes.delete', [$merchantType->id]) !!}" onclick="return confirm('@lang('merchantTypes/table.delete_confirm_message')')"><i class="fa fa-trash-o"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
