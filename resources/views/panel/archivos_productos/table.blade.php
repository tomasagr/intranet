<table class="table table-responsive" id="archivosProductos-table">
    <thead>
        <th>Titulo</th>
        <th>Archivo</th>
        <th colspan="3">Acciones</th>
    </thead>
    <tbody>
    @foreach($archivosProductos as $archivosProductos)
        <tr>
            <td>{!! $archivosProductos->titulo !!}</td>
            <td><a href="{{asset('storage/'.$archivosProductos->archivo)}}" target="_blank" class="btn btn-info btn-xs">Ver</a></td>
            <td>
                {!! Form::open(["url" => "/panel/productos/$productoId/archivos/$archivosProductos->id", 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="/panel/productos/{{$productoId}}/archivos/{{$archivosProductos->id}}/edit" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>