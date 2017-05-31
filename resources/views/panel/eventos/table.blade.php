<table class="table table-responsive" id="eventos-table">
    <thead>
        <th>Titulo</th>
        <th>Cuerpo</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Tipo</th>
        <th colspan="3">Acciones</th>
    </thead>
    <tbody>
    @foreach($eventos as $eventos)
        <tr>
            <td>{!! $eventos->titulo !!}</td>
            <td>{!! $eventos->cuerpo !!}</td>
            <td>{!! $eventos->fecha !!}</td>
            <td>{!! $eventos->hora !!}</td>
            <td>{!! $eventos->tipo !!}</td>
            <td>
                {!! Form::open(['route' => ['panel.eventos.destroy', $eventos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('panel.eventos.edit', [$eventos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>