<table class="table table-responsive" id="contenidos-table">
    <thead>
        <th>Titulo</th>
        <th>Cuerpo</th>
        <th>Fecha</th>
        <th colspan="3">Acciones</th>
    </thead>
    <tbody>
    @foreach($contenidos as $contenido)
        <tr>
            <td>{!! $contenido->titulo !!}</td>
            <td>{!! substr($contenido->cuerpo, 0, 50) !!}...</td>
            <td>{!! $contenido->created_at !!}</td>
            <td>
                {!! Form::open(['route' => ['panel.contenidos.destroy', $contenido->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('panel.contenidos.edit', [$contenido->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>