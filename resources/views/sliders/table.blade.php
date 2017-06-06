<table class="table table-responsive" id="sliders-table">
    <thead>
        <th>Pagina</th>
        <th>Imagen</th>
        <th colspan="3">Acción</th>
    </thead>
    <tbody>
    @foreach($sliders as $slider)
        <tr>
            <td>{!! $slider->contenido->titulo !!}</td>
            <td><a class="btn btn-info btn-xs" href="{{asset('/storage/'.$slider->imagen)}}" target="_blank">Ver</a></td>
            <td>
                {!! Form::open(['route' => ['sliders.destroy', $slider->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>