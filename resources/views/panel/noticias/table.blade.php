<table class="table table-responsive" id="noticias-table">
    <thead>
        <th>Titulo</th>
        <th>Cuerpo</th>
        <th>Fecha</th>
        <th colspan="3">Acciones</th>
    </thead>
    <tbody>
    @foreach($noticias as $noticias)
        <tr>
            <td>{!! $noticias->titulo !!}</td>
            <td>{!! $noticias->cuerpo !!}</td>
            <td>{!! substr($noticias->created_at, 0, 50) !!}...</td>
            <td>
                {!! Form::open(['route' => ['panel.noticias.destroy', $noticias->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @if ($noticias->category_id != 1)
                            <a href="{!! route('panel.productos.edit', [$noticias->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        @else
                            <a href="{!! route('panel.noticias.edit', [$noticias->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        @endif
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>