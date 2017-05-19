<table class="table table-responsive" id="rSES-table">
    <thead>
        <th>Titulo</th>
        <th>Cuerpo</th>
        <th>Puesto</th>
        <th>Ubicacion</th>
        <th colspan="3">Acciones</th>
    </thead>
    <tbody>
    @foreach($rSES as $rSE)
        <tr>
            <td>{!! $rSE->titulo !!}</td>
            <td>{!! $rSE->cuerpo !!}</td>
            <td>{!! $rSE->puesto !!}</td>
            <td>{!! $rSE->ubicacion !!}</td>
            <td>
                {!! Form::open(['route' => ['panel.rSES.destroy', $rSE->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('panel.rSES.edit', [$rSE->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Esta seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>