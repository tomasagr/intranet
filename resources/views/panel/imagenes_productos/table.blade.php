<table class="table table-responsive" id="imagenesProductos-table">
    <thead>
        <th>Imagen</th>
        <th colspan="3">Accion</th>
    </thead>
    <tbody>
    @foreach($imagenesProductos as $imagenesProductos)
        <tr>
            <td><a href="{{asset('storage/'.$imagenesProductos->imagen)}}" target="_blank" class="btn btn-info btn-xs">Ver</a></td>
            <td>
                {!! Form::open(["url" => "/panel/productos/$productoId/imagenes/$imagenesProductos->id", 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="/panel/productos/{{$productoId}}/imagenes/{{$imagenesProductos->id}}/edit" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>