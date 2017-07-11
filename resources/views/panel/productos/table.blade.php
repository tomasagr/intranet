<table class="table table-responsive" id="productos-table">
    <thead>
        <th>Aplicaciones Titulo</th>
        <th>Categoria</th>
        <th colspan="3">Acciones</th>
    </thead>
    <tbody>
    @foreach($productos as $productos)
        <tr>
            <td>{!! $productos->aplicaciones_titulo !!}</td>
            <td>{!! $productos->category->name !!}</td>
            <td>
                {!! Form::open(['route' => ['panel.productos.destroy', $productos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('panel.productos.edit', [$productos->id]) !!}" class='btn btn-default btn-xs'>
                        <i class="glyphicon glyphicon-edit"></i>
                    </a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>