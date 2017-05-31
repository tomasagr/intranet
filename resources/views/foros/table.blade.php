<table class="table table-responsive" id="foros-table">
    <thead>
        <th>Nombre</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($foros as $foro)
        <tr>
            <td>{!! $foro->nombre !!}</td>
            <td>
                {!! Form::open(['route' => ['foros.destroy', $foro->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('foros.edit', [$foro->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>