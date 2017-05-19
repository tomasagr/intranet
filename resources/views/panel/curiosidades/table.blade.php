<table class="table table-responsive" id="curiosidades-table">
    <thead>
        <th>Titulo</th>
        <th>Descripcion</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($curiosidades as $curiosidades)
        <tr>
            <td>{!! $curiosidades->titulo !!}</td>
            <td>{!! $curiosidades->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['panel.curiosidades.destroy', $curiosidades->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('panel.curiosidades.show', [$curiosidades->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('panel.curiosidades.edit', [$curiosidades->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>