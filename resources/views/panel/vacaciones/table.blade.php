<table class="table table-responsive" id="vacaciones-table">
    <thead>
        <th>Titulo</th>
        <th>Cuerpo</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Usuario</th>
        <th colspan="3">Acciones</th>
    </thead>
    <tbody>
    @foreach($vacaciones as $vacaciones)
        <tr>
            <td>{!! $vacaciones->titulo !!}</td>
            <td>{!! $vacaciones->cuerpo !!}</td>
            <td>{!! $vacaciones->fecha !!}</td>
            <td>{!! $vacaciones->hora !!}</td>
            <td>{!! $vacaciones->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['panel.vacaciones.destroy', $vacaciones->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('panel.vacaciones.show', [$vacaciones->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('panel.vacaciones.edit', [$vacaciones->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>