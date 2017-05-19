<table class="table table-responsive" id="informacions-table">
    <thead>
        <th>Titulo</th>
        <th>Descripcion</th>
        <th colspan="3">Acciones</th>
    </thead>
    <tbody>
    @foreach($informacions as $informacion)
        <tr>
            <td>{!! $informacion->titulo !!}</td>
            <td>{!! $informacion->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['panel.informacions.destroy', $informacion->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('panel.informacions.edit', [$informacion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Esta seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>